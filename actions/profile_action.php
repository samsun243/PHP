<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (!is_logged_in()) {
    redirect('../login.php');
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $username = clean($_POST['username']);
        $email = clean($_POST['email']);
        $full_name = clean($_POST['full_name']);
        $phone = clean($_POST['phone']);
        $birth_date = clean($_POST['birth_date']);
        $city = clean($_POST['city']);
        $country = clean($_POST['country']);
        $address = clean($_POST['address']);
        $bio = clean($_POST['bio']);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($username) || empty($email) || empty($full_name)) {
            redirect('../profile.php', 'danger', 'Le nom, le pseudo et l\'email sont obligatoires.');
        }

        // Check if email or username is already taken by ANOTHER user
        $stmt = $pdo->prepare("SELECT id FROM users WHERE (email = ? OR username = ?) AND id != ?");
        $stmt->execute([$email, $username, $user_id]);
        if ($stmt->fetch()) {
            redirect('../profile.php', 'danger', 'Nom d\'utilisateur ou email déjà utilisé.');
        }

        $query = "UPDATE users SET username = ?, email = ?, full_name = ?, phone = ?, birth_date = ?, city = ?, country = ?, address = ?, bio = ? ";
        $params = [$username, $email, $full_name, $phone, $birth_date, $city, $country, $address, $bio];

        if (!empty($new_password)) {
            if ($new_password !== $confirm_password) {
                redirect('../profile.php', 'danger', 'Les mots de passe ne correspondent pas.');
            }
            $query .= ", password = ? ";
            $params[] = password_hash($new_password, PASSWORD_DEFAULT);
        }

        $query .= " WHERE id = ?";
        $params[] = $user_id;

        $stmt = $pdo->prepare($query);
        if ($stmt->execute($params)) {
            $_SESSION['username'] = $username;
            redirect('../profile.php', 'success', 'Profil mis à jour avec succès.');
        } else {
            redirect('../profile.php', 'danger', 'Une erreur est survenue lors de la mise à jour.');
        }

    } elseif (isset($_POST['delete_account'])) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        if ($stmt->execute([$user_id])) {
            session_destroy();
            // Start a new session for the toast
            session_start();
            add_toast('info', 'Votre compte a été supprimé.');
            header("Location: ../index.php");
            exit();
        } else {
            redirect('../profile.php', 'danger', 'Erreur lors de la suppression du compte.');
        }
    }
} else {
    redirect('../profile.php');
}
?>
