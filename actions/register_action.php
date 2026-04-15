<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

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

    // Validation
    if ($password !== $confirm_password) {
        redirect('../register.php', 'danger', 'Les mots de passe ne correspondent pas.');
    }

    if (empty($full_name) || empty($username) || empty($email) || empty($phone) || 
        empty($password) || empty($birth_date) || empty($address) || 
        empty($city) || empty($country) || empty($bio)) {
        redirect('../register.php', 'danger', 'Tous les champs marqués d\'un asterisque sont obligatoires.');
    }

    // Check if email or username exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        redirect('../register.php', 'danger', 'Ce nom d\'utilisateur ou cet email est déjà utilisé.');
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user with all fields
    $sql = "INSERT INTO users (full_name, username, email, phone, password, birth_date, address, city, country, bio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$full_name, $username, $email, $phone, $hashed_password, $birth_date, $address, $city, $country, $bio])) {
        redirect('../login.php', 'success', 'Félicitations ! Votre compte premium a été créé avec succès. Vous pouvez maintenant vous connecter.');
    } else {
        redirect('../register.php', 'danger', 'Une erreur technique est survenue lors de la création de votre compte.');
    }
} else {
    redirect('../register.php');
}
?>
