<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (!is_admin()) {
    redirect('../index.php', 'danger', 'Accès refusé.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);
    
    // Check if the admin is trying to edit themselves via this form (for role/status changes, that's dangerous)
    // We'll allow it but ideally protect against removing their own admin status
    if ($user_id == $_SESSION['user_id'] && $_POST['role'] !== 'admin') {
         redirect("../edit_user.php?id=$user_id", 'danger', 'Vous ne pouvez pas retirer vos propres droits d\'administrateur.');
    }

    $full_name = clean($_POST['full_name']);
    $username = clean($_POST['username']);
    $email = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $birth_date = clean($_POST['birth_date']);
    $address = clean($_POST['address']);
    $city = clean($_POST['city']);
    $country = clean($_POST['country']);
    $bio = clean($_POST['bio']);
    $role = clean($_POST['role']);
    $is_active = intval($_POST['is_active']);

    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Validation
    if (empty($full_name) || empty($username) || empty($email) || empty($phone) || 
        empty($birth_date) || empty($address) || empty($city) || empty($country)) {
        redirect("../edit_user.php?id=$user_id", 'danger', 'Veuillez remplir tous les champs obligatoires.');
    }

    // Check if new username or email exists for OTHER users
    $stmt = $pdo->prepare("SELECT id FROM users WHERE (email = ? OR username = ?) AND id != ?");
    $stmt->execute([$email, $username, $user_id]);
    if ($stmt->fetch()) {
        redirect("../edit_user.php?id=$user_id", 'danger', 'Ce nom d\'utilisateur ou cet email est déjà utilisé par un autre compte.');
    }

    // Build the query
    if (!empty($new_password)) {
        if ($new_password !== $confirm_new_password) {
            redirect("../edit_user.php?id=$user_id", 'danger', 'Les nouveaux mots de passe ne correspondent pas.');
        }
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE users SET 
                full_name = ?, username = ?, email = ?, phone = ?, birth_date = ?, 
                address = ?, city = ?, country = ?, bio = ?, role = ?, is_active = ?, password = ? 
                WHERE id = ?";
        $params = [$full_name, $username, $email, $phone, $birth_date, $address, $city, $country, $bio, $role, $is_active, $hashed_password, $user_id];
    } else {
        $sql = "UPDATE users SET 
                full_name = ?, username = ?, email = ?, phone = ?, birth_date = ?, 
                address = ?, city = ?, country = ?, bio = ?, role = ?, is_active = ? 
                WHERE id = ?";
        $params = [$full_name, $username, $email, $phone, $birth_date, $address, $city, $country, $bio, $role, $is_active, $user_id];
    }

    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute($params)) {
        redirect('../admin.php', 'success', "Le profil de l'utilisateur a été mis à jour avec succès.");
    } else {
        redirect("../edit_user.php?id=$user_id", 'danger', 'Une erreur technique est survenue lors de la mise à jour.');
    }
} else {
    redirect('../admin.php');
}
?>
