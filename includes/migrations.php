<?php
/**
 * Simple Migration System
 * Ensures the database schema is up-to-date automatically.
 */

try {
    // 1. Check if 'users' table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() == 0) {
        // Table doesn't exist, create it from scratch
        $sql = file_get_contents(__DIR__ . '/../database.sql');
        $pdo->exec($sql);
    } else {
        // 2. Check for 'is_active' column
        $stmt = $pdo->query("SHOW COLUMNS FROM users LIKE 'is_active'");
        if ($stmt->rowCount() == 0) {
            // Column missing, add it
            $pdo->exec("ALTER TABLE users ADD COLUMN is_active TINYINT(1) DEFAULT 1 AFTER bio");
        }

        // Add other columns here if they were missing from older versions
        $columns_to_check = [
            'full_name' => "ALTER TABLE users ADD COLUMN full_name VARCHAR(100) AFTER id",
            'phone' => "ALTER TABLE users ADD COLUMN phone VARCHAR(20) AFTER email",
            'birth_date' => "ALTER TABLE users ADD COLUMN birth_date DATE AFTER profile_picture",
            'address' => "ALTER TABLE users ADD COLUMN address TEXT AFTER birth_date",
            'city' => "ALTER TABLE users ADD COLUMN city VARCHAR(100) AFTER address",
            'country' => "ALTER TABLE users ADD COLUMN country VARCHAR(100) AFTER city",
            'bio' => "ALTER TABLE users ADD COLUMN bio TEXT AFTER country",
        ];

        foreach ($columns_to_check as $column => $alter_sql) {
            $check = $pdo->query("SHOW COLUMNS FROM users LIKE '$column'");
            if ($check->rowCount() == 0) {
                $pdo->exec($alter_sql);
            }
        }
    }
} catch (PDOException $e) {
    // Silently log error or handle it - for now we just let it be
    // error_log("Migration error: " . $e->getMessage());
}
