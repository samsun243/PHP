<?php 
include 'header.php'; 

if (!is_logged_in()) {
    redirect('login.php', 'warning', 'Veuillez vous connecter pour accéder à votre profil.');
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    redirect('logout.php');
}

include 'views/profile.view.php'; 
include 'footer.php'; 
?>
