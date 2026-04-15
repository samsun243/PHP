<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (!is_admin()) {
    redirect('../index.php', 'danger', 'Accès refusé.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toggle_status']) || (isset($_POST['action']) && $_POST['action'] === 'toggle_status')) {
        $user_id = intval($_POST['user_id']);
        $new_status = intval($_POST['is_active']) == 1 ? 0 : 1;

        // Prevent self-deactivation via admin panel for safety
        if ($user_id == $_SESSION['user_id']) {
            redirect('../admin.php', 'warning', 'Vous ne pouvez pas modifier votre propre statut.');
        }

        $stmt = $pdo->prepare("UPDATE users SET is_active = ? WHERE id = ?");
        if ($stmt->execute([$new_status, $user_id])) {
            $msg = $new_status == 1 ? 'Utilisateur réactivé.' : 'Utilisateur désactivé.';
            redirect('../admin.php', 'success', $msg);
        } else {
            redirect('../admin.php', 'danger', 'Erreur lors de la modification du statut.');
        }
    }
} else {
    redirect('../admin.php');
}
?>
