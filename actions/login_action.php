<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = clean($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        redirect('../login.php', 'danger', 'Veuillez saisir votre email et votre mot de passe pour vous connecter.');
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Check if user is active
        if ($user['is_active'] == 0) {
            redirect('../login.php', 'danger', 'Votre compte a été supprimé.');
        }

        // Auth success
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        redirect('../profile.php', 'success', 'Connexion réussie !');
    } else {
        redirect('../login.php', 'danger', 'Email ou mot de passe incorrect.');
    }
} else {
    redirect('../login.php');
}
?>
