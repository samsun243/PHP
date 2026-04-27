<section class="hero-section animate-fade-in py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="hero-title mb-4">Gestion des <span class="gradient-text">Utilisateurs</span></h1>
                <div class="d-flex justify-content-center gap-3 flex-wrap mt-5">
                    <?php if (is_logged_in()): ?>
                        <a href="profile.php" class="btn btn-primary btn-lg d-flex align-items-center gap-2 px-4 rounded-pill">
                            <i data-lucide="user-circle"></i> Votre Profil
                        </a>
                    <?php else: ?>
                        <a href="register.php" class="btn btn-primary btn-lg d-flex align-items-center gap-2 px-5 rounded-pill shadow-lg">
                            Commencer
                        </a>
                        <a href="login.php" class="btn btn-outline-primary btn-lg d-flex align-items-center gap-2 px-5 rounded-pill shadow-sm" style="backdrop-filter: blur(8px);">
                            <i data-lucide="log-in"></i> Connexion
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
