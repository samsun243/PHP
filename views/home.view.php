<section class="hero-section animate-fade-in">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="hero-title">Gérez vos utilisateurs avec <br><span class="gradient-text">élégance et sécurité</span>.</h1>
                <p class="hero-subtitle mx-auto">Une plateforme SaaS-ready, ultra-sécurisée et intuitive. Profitez d'une interface premium conçue pour offrir la meilleure expérience utilisateur possible.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <?php if (is_logged_in()): ?>
                        <a href="profile.php" class="btn btn-primary btn-lg d-flex align-items-center gap-2">
                            <i data-lucide="user-circle"></i> Votre Espace Personnel
                        </a>
                    <?php else: ?>
                        <a href="register.php" class="btn btn-primary btn-lg d-flex align-items-center gap-2">
                            Commencer maintenant
                        </a>
                        <a href="login.php" class="btn btn-outline-primary btn-lg d-flex align-items-center gap-2 shadow-sm" style="backdrop-filter: blur(8px);">
                            <i data-lucide="log-in"></i> Connexion
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container pb-5">
    <div class="row g-4 mt-2">
        <div class="col-md-4 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i data-lucide="shield-check"></i>
                </div>
                <h4 class="fw-bold">Sécurité de Pointe</h4>
                <p class="text-muted small mb-0">Protection avancée contre les failles XSS et injections SQL. Vos données sont cryptées suivant les derniers standards de l'industrie.</p>
            </div>
        </div>
        <div class="col-md-4 animate-slide-up" style="animation-delay: 0.2s;">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon bg-accent bg-opacity-10 text-accent">
                    <i data-lucide="contact"></i>
                </div>
                <h4 class="fw-bold">Profils Enrichis</h4>
                <p class="text-muted small mb-0">Des fiches utilisateurs complètes incluant biographie, localisation et réseaux sociaux pour une gestion personnalisée.</p>
            </div>
        </div>
        <div class="col-md-4 animate-slide-up" style="animation-delay: 0.3s;">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i data-lucide="zap"></i>
                </div>
                <h4 class="fw-bold">Performance Lightning</h4>
                <p class="text-muted small mb-0">Une architecture optimisée pour une rapidité d'exécution sans compromis, offrant une fluidité absolue sur tous les supports.</p>
            </div>
        </div>
    </div>
</div>
