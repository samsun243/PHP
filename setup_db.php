<?php
// Script de configuration automatique de la base de données
$host = 'localhost';
$user = 'PRIMS-TECH';
$pass = 'myloveama'; // Modifiez ceci si vous avez un mot de passe MySQL

try {
    // 1. Connexion sans base de données
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Création de la base de données
    $pdo->exec("CREATE DATABASE IF NOT EXISTS utilisateur CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Base de données 'utilisateur' créée ou déjà existante.\n";

    // 3. Sélection de la base
    $pdo->exec("USE utilisateur");

    // 4. Création de la table users
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        full_name VARCHAR(100) DEFAULT NULL,
        phone VARCHAR(20) DEFAULT NULL,
        bio TEXT DEFAULT NULL,
        role ENUM('user', 'admin') DEFAULT 'user',
        profile_picture VARCHAR(255) DEFAULT 'default.png',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "✅ Table 'users' créée ou déjà existante.\n";

    echo "\n🚀 Configuration terminée ! Vous pouvez maintenant lancer le serveur.\n";

} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
    echo "💡 Astuce : Vérifiez que MySQL est lancZERTYUI  YIUOPIé et que vos identifiants dans setup_db.php sont corrects.\n";
}
?>
