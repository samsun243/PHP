<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (!is_admin()) {
    redirect('../index.php', 'danger', 'Accès refusé.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = clean($_POST['full_name']);
    $username = clean($_POST['username']);
    $email = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $birth_date = clean($_POST['birth_date']);
    $address = clean($_POST['address']);
    $city = clean($_POST['city']);
    $country = clean($_POST['country']);
    $bio = clean($_POST['bio']);
    $role = clean($_POST['role']);
    $is_active = intval($_POST['is_active']);

    // Validation
    if ($password !== $confirm_password) {
        redirect('../add_user.php', 'danger', 'Les mots de passe ne correspondent pas.');
    }

    if (empty($full_name) || empty($username) || empty($email) || empty($phone) || 
        empty($password) || empty($birth_date) || empty($address) || 
        empty($city) || empty($country)) {
        redirect('../add_user.php', 'danger', 'Veuillez remplir tous les champs obligatoires.');
    }

    // Check if email or username exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        redirect('../add_user.php', 'danger', 'Ce nom d\'utilisateur ou cet email est déjà utilisé.');
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user with all fields including role and status
    $sql = "INSERT INTO users (full_name, username, email, phone, password, birth_date, address, city, country, bio, role, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([
        $full_name, $username, $email, $phone, $hashed_password, 
        $birth_date, $address, $city, $country, $bio, $role, $is_active
    ])) {
        redirect('../admin.php', 'success', "L'utilisateur '$username' a été créé avec succès.");
    } else {
        redirect('../add_user.php', 'danger', 'Une erreur technique est survenue lors de la création de l\'utilisateur.');
    }
} else {
    redirect('../add_user.php');
}
?>
