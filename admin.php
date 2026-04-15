<?php 
include 'header.php'; 

if (!is_admin()) {
    redirect('index.php', 'danger', 'Accès réservé aux administrateurs.');
}

$stmt = $pdo->query("SELECT id, username, email, role, is_active, created_at FROM users ORDER BY created_at DESC");
$users = $stmt->fetchAll();

include 'views/admin.view.php'; 
include 'footer.php'; 
?>
