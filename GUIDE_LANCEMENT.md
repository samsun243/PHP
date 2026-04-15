# Guide de Lancement - UserDev Premium

Ce guide vous explique étape par étape comment déployer et exécuter le système de gestion d'utilisateurs sur les environnements Linux et Windows.

---

## 🛠 Prérequis Communs

Avant de commencer, vous devez avoir accès aux éléments suivants :
1. **PHP** (version 8.0 ou supérieure recommandée).
2. **MySQL** ou **MariaDB**.
3. **Un navigateur web moderne** (Chrome, Firefox, Edge, Safari).

---

## 🐧 Lancement sur Linux (Ubuntu / Debian)

### 1. Installation des dépendances
Si PHP et MySQL ne sont pas encore installés, ouvrez votre terminal et exécutez les commandes suivantes :

```bash
sudo apt update
sudo apt install php php-cli php-mysql mysql-server php-pdo
```

### 2. Configuration de la base de données
Connectez-vous à MySQL en tant qu'administrateur :
```bash
sudo mysql -u root
```

Ensuite, créez la base de données, l'utilisateur du projet, et importez la structure :
```sql
-- Création de l'utilisateur (identifiants définis dans includes/db.php)
CREATE USER 'PRIMS-TECH'@'localhost' IDENTIFIED BY 'myloveama';
GRANT ALL PRIVILEGES ON *.* TO 'PRIMS-TECH'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS utilisateur;
EXIT;
```

**Importation de la structure :**
Depuis le dossier de votre projet (là où se trouve `database.sql`), exécutez :
```bash
mysql -u PRIMS-TECH -p utilisateur < database.sql
```
*(Saisissez le mot de passe `myloveama` lorsqu'il vous sera demandé).*

### 3. Démarrer le serveur
Utilisez le serveur de développement intégré de PHP. Dans le terminal, naviguez vers le dossier du projet et lancez :
```bash
php -S localhost:8000
```

### 4. Accès à l'application
Ouvrez votre navigateur et allez sur : **http://localhost:8000**
*(N'oubliez pas d'aller sur `http://localhost:8000/update_db.php` si c'est votre premier lancement pour mettre à jour les tables avec les derniers champs).*

---

## 🪟 Lancement sur Windows (Avec XAMPP / WAMP)

Pour Windows, l'approche la plus simple est d'utiliser un environnement tout-en-un tel que **XAMPP** ou **WAMP**. 

### 1. Installation
- Téléchargez et installez [XAMPP](https://www.apachefriends.org/fr/index.html) (qui inclut PHP et MySQL).
- Lors de l'installation, assurez-vous que les modules **Apache** et **MySQL** sont cochés.

### 2. Démarrage des services
- Ouvrez le **XAMPP Control Panel**.
- Cliquez sur **Start** pour les modules `Apache` et `MySQL`. Les deux doivent s'afficher en vert.

### 3. Déploiement des fichiers
- Allez dans le répertoire d'installation de XAMPP (généralement `C:\xampp`).
- Ouvrez le dossier `htdocs`.
- Copiez l'intégralité du dossier de votre projet (ex: `UserDev`) à l'intérieur du dossier `htdocs`. Le chemin devrait ressembler à `C:\xampp\htdocs\UserDev`.

### 4. Configuration de la base de données (via phpMyAdmin)
- Cliquez sur le bouton **Admin** à côté du module MySQL dans le panel XAMPP (ou allez sur `http://localhost/phpmyadmin`).
- Allez dans l'onglet **Comptes utilisateurs** et cliquez sur **Ajouter un compte utilisateur**.
    - **Nom d'utilisateur** : `PRIMS-TECH`
    - **Nom d'hôte** : `Local` (localhost)
    - **Mot de passe** : `myloveama`
    - Cochez la case **"Donner tous les privilèges sur les bases de données"** tout en bas de la page, puis cliquez sur **Exécuter**.

- Allez dans l'onglet **Importer**.
- Cliquez sur **Choisir un fichier** et sélectionnez le fichier `database.sql` situé dans votre dossier de projet.
- Cliquez sur **Exécuter**.

### 5. Accès à l'application
Ouvrez votre navigateur web et accédez à : **http://localhost/UserDev** (remplacez `UserDev` par le nom de votre dossier).
*(Comme sous Linux, allez sur `http://localhost/UserDev/update_db.php` la première fois pour migrer les derniers champs de la base).*

---

## 👑 Premier accès Administrateur (Mode "Boss")
Pour créer votre premier compte "Boss" avec tous les droits :
Accédez à l'URL : `http://localhost:8000/register_admin.php` (Linux) ou `http://localhost/UserDev/register_admin.php` (Windows) et créez votre profil. Vous pourrez ensuite vous connecter normalement depuis la page de connexion standard.
