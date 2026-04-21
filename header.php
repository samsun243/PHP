<?php 
require_once 'includes/functions.php'; 
require_once 'includes/db.php'; 

// Instant security check: If user is logged in, verify they aren't deactivated
if (is_logged_in()) {
    if (!check_user_status($pdo, $_SESSION['user_id'])) {
        // User was deactivated by admin!
        session_destroy();
        // Redirect to relative path from root since header is used in subdirs sometimes? 
        // Actually header.php is usually called from root files here.
        header("Location: login.php?status=deactivated");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top glass-nav py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <div class="logo-icon me-2">
                    <i data-lucide="shield-check"></i>
                </div>
                <span class="fs-4 fw-bold gradient-text">UserDev</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i data-lucide="menu" class="text-primary" style="width: 32px; height: 32px;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link px-3 <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">
                            <i data-lucide="home" class="me-1"></i> Accueil
                        </a>
                    </li>
                    <?php if (is_logged_in()): ?>
                        <li class="nav-item">
                            <a class="nav-link px-3 <?= basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : '' ?>" href="profile.php">
                                <i data-lucide="user" class="me-1"></i> Mon Profil
                            </a>
                        </li>
                        <?php if (is_admin()): ?>
                            <li class="nav-item">
                                <a class="nav-link px-3 text-primary fw-bold <?= basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active' : '' ?>" href="admin.php">
                                    <i data-lucide="shield-alert" class="me-1"></i> Admin
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-danger btn-sm border-0 px-3 rounded-pill d-flex align-items-center gap-2" href="logout.php">
                                <span class="d-lg-none">Déconnexion</span>
                                <i data-lucide="power" class="text-danger"></i>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link px-3 <?= basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '' ?>" href="login.php">
                                Connexion
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-primary text-white px-4 rounded-pill shadow-sm" href="register.php">
                                S'inscrire <i data-lucide="arrow-right"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="toast-container" class="position-fixed p-3" style="z-index: 1060;"></div>
    <main class="container py-5">
