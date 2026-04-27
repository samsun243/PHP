# Guide Technique - Système UserDev Premium

Ce document explique le fonctionnement interne du code, de l'inscription à la gestion administrative, ainsi que les fonctions clés utilisées.

---

## 1. Architecture Globale

Le projet suit une structure **MVC simplifiée** :

- **Racine** : Les contrôleurs de pages (`index.php`, `login.php`, `admin.php`).
- **`views/`** : Les fichiers d'interface (HTML/CSS).
- **`actions/`** : Le traitement logique (POST) et les interactions avec la base de données.
- **`includes/`** : Les ressources partagées (connexion DB, fonctions globales).

---

## 2. Flux d'Authentification

### Inscription (`register.php` -> `actions/register_action.php`)

1. **Nettoyage** : La fonction `clean()` (dans `functions.php`) utilise `htmlspecialchars()` pour éviter les failles XSS.
2. **Hachage** : Le mot de passe est haché avec `password_hash($password, PASSWORD_DEFAULT)`, la méthode la plus sécurisée en PHP.
3. **Insertion** : Les données sont insérées via une requête préparée PDO pour éviter les injections SQL.

### Connexion (`login.php` -> `actions/login_action.php`)

1. **Vérification** : On récupère l'utilisateur par son email.
2. **Validation** : `password_verify($password, $user['password'])` compare le mot de passe saisi avec le hachage en base.
3. **Session** : Si valide, on stocke `user_id`, `username` et `role` dans la variable superglobale `$_SESSION`.
4. **Statut** : On vérifie si `is_active == 1`. Si le compte est désactivé, l'accès est refusé.

---

## 3. Fonctionnalités Administratives (Mode "Boss")

### Sécurité Temps Réel

Dans `header.php`, nous avons ajouté un check systématique :

```php
if (is_logged_in()) {
    if (!check_user_status($pdo, $_SESSION['user_id'])) {
        session_destroy();
        header("Location: login.php?status=deactivated");
        exit();
    }
}
```

Cela garantit qu'un utilisateur désactivé est expulsé **immédiatement**, même s'il était déjà connecté.

### Gestion des Utilisateurs

- **Création Rapide** (`add_user.php`) : L'administrateur peut créer manuellement des comptes (pratique pour l'onboarding).
- **Toggle Statut** : L'admin peut activer/désactiver un compte en un clic. Un compte `is_active = 0` est bloqué à la connexion et expulsé s'il est déjà en ligne.
- **Édition complète** (`edit_user.php`) : L'admin a le pouvoir de modifier absolument tous les champs d'un utilisateur, y compris son rôle (promouvoir en admin) ou de forcer un nouveau mot de passe s'il a été oublié.
- **Badge "Boss"** : Un administrateur ne peut pas se désactiver lui-même ou s'auto-rétrograder via le dashboard pour éviter de bloquer le système.

---

## 4. Gestion du Profil (Utilisateur Lambda)

Chaque utilisateur peut gérer ses informations personnelles via la page `profile.php`.

### Processus de modification

1. **Formulaire** : L'utilisateur remplit ses informations (Bio, Téléphone, Adresse, etc.) dans `views/profile.view.php`.
2. **Traitement** (`actions/profile_action.php`) :
   - Le script vérifie que l'utilisateur est bien connecté.
   - Les données sont nettoyées avec `clean()`.
   - **Changement de Mot de Passe** : Si les champs de mot de passe sont remplis, le système vérifie que les deux saisies correspondent avant de hacher le nouveau mot de passe.
   - **Mise à jour PDO** : Une requête `UPDATE` met à jour les informations dans la table `users`.
3. **Retour** : Un toast de succès est ajouté et l'utilisateur est redirigé vers son profil mis à jour.

---

## 4. Fonctions Clés (`includes/functions.php`)

| Fonction | Rôle |
| :--- | :--- |
| `add_toast()` | Ajoute une notification visuelle qui s'affichera sur la page suivante. |
| `is_logged_in()` | Vérifie simplement si une session utilisateur existe. |
| `is_admin()` | Vérifie si l'utilisateur possède le rôle 'admin'. |
| `check_user_status()` | Requête la DB pour vérifier si le compte est toujours actif (sécurité). |
| `redirect()` | Gère la redirection HTTP et l'ajout de messages toasts en une seule ligne. |
| `clean()` | Sécurise les entrées utilisateur contre les injections de scripts. |

---

## 5. Automatisation de la Base de Données (`includes/migrations.php`)

Ce script s'exécute à chaque connexion DB. Il utilise `SHOW COLUMNS` pour détecter si des colonnes (comme `is_active`) manquent et les crée à la volée via `ALTER TABLE`. Cela permet au code de fonctionner sur Windows (XAMPP) sans erreur manuelle.

---

## 6. Analyse Profonde des Fichiers

Cette section détaille chaque fichier du projet pour une compréhension totale de la logique, de la sécurité et des interactions système.

### 📁 Cœur du Système (`includes/`)

- **`db.php`** : Point d'entrée de la connexion PDO. Il configure le mode d'erreur sur `EXCEPTION` et force le mode de récupération en `FETCH_ASSOC`.
- **`functions.php`** : Boîte à outils globale contenant `clean()` (contre les failles XSS), `add_toast()` et `check_user_status()`.
- **`migrations.php`** : Gère l'auto-réparation du schéma SQL (ALTER TABLE) pour la compatibilité Windows/Linux.

### 📁 Logique métier (`actions/`)

- **`login_action.php`** : Vérifie le mot de passe (`password_verify`) et le statut `is_active`.
- **`register_action.php`** : Gère l'inscription et le hachage sécurisé `BCRYPT`.
- **`profile_action.php`** : Mise à jour du profil utilisateur avec gestion intelligente du mot de passe (ne l'écrase que s'il est saisi).
- **`admin_action.php`** : Gère l'activation/désactivation des comptes via une bascule logique.

### 📁 Contrôleurs & Vues

- **`header.php`** : Gère la navbar dynamique et la sécurité temps réel (expulsion des bannis).
- **`admin.view.php`** : Affiche le tableau de bord avec les classes CSS premium (`table-admin`).
- **`profile.view.php`** : Interface organisée pour la gestion des informations personnelles.

### 📁 Design & Sécurité

- **`style.css`** : Centralise le design (Glassmorphism, variables de couleurs, animations).
- **Points de Sécurité** : Injections SQL (via PDO), XSS (via htmlspecialchars), et Hachage (via password_hash).
