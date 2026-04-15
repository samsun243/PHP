-- Creation de l'utilisateur PRIMS-TECH (mot de passe: myloveama)
-- Utilisation de la syntaxe standard MariaDB 11.x
CREATE USER IF NOT EXISTS 'PRIMS-TECH'@'localhost' IDENTIFIED BY 'myloveama';
CREATE USER IF NOT EXISTS 'PRIMS-TECH'@'127.0.0.1' IDENTIFIED BY 'myloveama';
CREATE USER IF NOT EXISTS 'PRIMS-TECH'@'PRIMS-TECH' IDENTIFIED BY 'myloveama';

-- Attribution des privileges sur la base de donnees 'utilisateur'
GRANT ALL PRIVILEGES ON utilisateur.* TO 'PRIMS-TECH'@'localhost';
GRANT ALL PRIVILEGES ON utilisateur.* TO 'PRIMS-TECH'@'127.0.0.1';
GRANT ALL PRIVILEGES ON utilisateur.* TO 'PRIMS-TECH'@'PRIMS-TECH';

-- Privilege global pour permettre la creation de la base de donnees via setup_db.php
GRANT ALL PRIVILEGES ON *.* TO 'PRIMS-TECH'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'PRIMS-TECH'@'127.0.0.1';
GRANT ALL PRIVILEGES ON *.* TO 'PRIMS-TECH'@'PRIMS-TECH';

-- Rechargement des privileges
FLUSH PRIVILEGES;
