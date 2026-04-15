<?php 
include 'header.php'; 

if (!is_admin()) {
    redirect('index.php', 'danger', 'Accès réservé aux administrateurs.');
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    redirect('admin.php', 'danger', 'Utilisateur non spécifié.');
}

$user_id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$target_user = $stmt->fetch();

if (!$target_user) {
    redirect('admin.php', 'danger', 'Utilisateur introuvable.');
}

include 'views/edit_user.view.php'; 
include 'footer.php'; 
?>
