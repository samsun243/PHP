<?php
session_start();

/**
 * Add a toast notification to the session.
 * @param string $type success|danger|info|warning
 * @param string $message The message to display
 */
function add_toast($type, $message) {
    if (!isset($_SESSION['toasts'])) {
        $_SESSION['toasts'] = [];
    }
    $_SESSION['toasts'][] = ['type' => $type, 'message' => $message];
}

/**
 * Check if user is logged in.
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Check if user is admin.
 */
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

/**
 * Redirect with a message.
 */
function redirect($url, $type = null, $message = null) {
    if ($type && $message) {
        add_toast($type, $message);
    }
    header("Location: $url");
    exit();
}

/**
 * Check if the current session user is still active in the database.
 */
function check_user_status($pdo, $user_id) {
    if (!$user_id) return false;
    $stmt = $pdo->prepare("SELECT is_active FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    return $user && (int)$user['is_active'] === 1;
}

/**
 * Sanitize input.
 */
function clean($data) {
    return htmlspecialchars(trim($data));
}
?>
