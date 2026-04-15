<?php
require_once 'includes/db.php';

try {
    echo "Starting database migration...<br>";

    // Add full_name if not exists
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS full_name VARCHAR(100) AFTER id");
    
    // Add phone if not exists
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS phone VARCHAR(20) AFTER email");
    
    // Add birth_date
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS birth_date DATE AFTER phone");
    
    // Add address
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS address TEXT AFTER birth_date");
    
    // Add city
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS city VARCHAR(100) AFTER address");
    
    // Add country
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS country VARCHAR(100) AFTER city");
    
    // Add bio
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS bio TEXT AFTER country");

    // Add is_active (Soft Delete)
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS is_active TINYINT(1) DEFAULT 1 AFTER role");

    echo "Migration completed successfully!<br>";
    echo "Fields added: full_name, phone, birth_date, address, city, country, bio.<br>";
    echo "<a href='index.php'>Return to Home</a>";

} catch (PDOException $e) {
    die("Migration failed: " . $e->getMessage());
}
?>
