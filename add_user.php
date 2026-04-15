<?php 
include 'header.php'; 

if (!is_admin()) {
    redirect('index.php', 'danger', 'Accès réservé aux administrateurs.');
}

include 'views/add_user.view.php'; 
include 'footer.php'; 
?>
