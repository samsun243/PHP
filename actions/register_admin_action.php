<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = clean($_POST['full_name']);
    $email = clean($_POST['email']);
    $password = $_POST['password'];

    // Validation
    if (empty($full_name) || empty($email) || empty($password)) {
        redirect('../register_admin.php', 'danger', 'Tous les champs sont obligatoires.');
    }

    // Auto-generate a username from the email
    $email_parts = explode('@', $email);
    $base_username = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $email_parts[0]));
    $username = $base_username;
    
    // Ensure uniqueness of the generated username
    $counter = 1;
    while (true) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $username = $base_username . $counter;
            $counter++;
        } else {
            break;
        }
    }

    // Check if email exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        redirect('../register_admin.php', 'danger', 'Cet email est déjà utilisé.');
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Hardcode role to 'admin' and status to 'active' (1)
    $role = 'admin';
    $is_active = 1;

    // Insert admin with bare minimum fields
    $sql = "INSERT INTO users (full_name, username, email, password, role, is_active) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$full_name, $username, $email, $hashed_password, $role, $is_active])) {
        redirect('../login.php', 'success', 'Compte administrateur créé avec succès. Username : ' . $username);
    } else {
        redirect('../register_admin.php', 'danger', 'Erreur technique lors de la création.');
    }
} else {
    redirect('../register_admin.php');
}
?>
