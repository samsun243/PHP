<div class="row justify-content-center mt-5">
    <div class="col-lg-5 col-md-7 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="text-center mb-5">
                <div class="icon-box mx-auto">
                    <i data-lucide="lock"></i>
                </div>
                <h2 class="fw-bold gradient-text">Accès Sécurisé</h2>
                <p class="text-muted">Connectez-vous à votre espace membre.</p>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'deactivated'): ?>
                <div class="alert alert-danger border-0 shadow-sm rounded-4 animate-slide-up mb-4 d-flex align-items-center gap-2">
                    <i data-lucide="alert-circle" class="flex-shrink-0"></i>
                    <div>Votre compte a été désactivé par l'administrateur.</div>
                </div>
            <?php endif; ?>
            
            <form action="actions/login_action.php" method="POST">
                <div class="mb-4">
                    <label class="form-label required">Adresse Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i data-lucide="mail"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="nom@exemple.com" required autofocus>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label required mb-0">Mot de passe</label>
                        <a href="#" class="text-primary small text-decoration-none fw-semibold">Oublié ?</a>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i data-lucide="key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="mb-4 form-check d-flex align-items-center gap-2">
                    <input type="checkbox" class="form-check-input mt-0" id="remember">
                    <label class="form-check-label text-muted small" for="remember">Rester connecté</label>
                </div>

                <div class="d-grid shadow-sm">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Se connecter <i data-lucide="log-in" class="ms-2"></i>
                    </button>
                </div>
            </form>
            
            <div class="text-center mt-5">
                <p class="text-muted mb-0">Nouveau ici ? <a href="register.php" class="text-primary fw-bold text-decoration-none">Créer un compte</a></p>
            </div>
        </div>
    </div>
</div>
