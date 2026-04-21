<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="text-center mb-5">
                <div class="icon-box mx-auto bg-primary bg-opacity-10 border-primary border-opacity-20 shadow-sm">
                    <i data-lucide="shield-check" class="text-primary"></i>
                </div>
                <h2 class="fw-bold gradient-text">Inscription Administrateur</h2>
                <p class="text-muted">Portail réservé à la création de comptes administrateurs.</p>
            </div>
            
            <form action="actions/register_admin_action.php" method="POST" class="needs-validation">
                <div class="mb-3">
                    <label class="form-label required">Nom Complet</label>
                    <div class="input-group">
                        <span class="input-group-text"><i data-lucide="user"></i></span>
                        <input type="text" name="full_name" class="form-control" placeholder="Entrez le nom complet" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Adresse Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i data-lucide="mail"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="admin@exemple.com" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label required">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i data-lucide="lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg py-3 rounded-pill border border-primary border-opacity-20">
                        <i data-lucide="shield-plus" class="me-2"></i> Créer le compte Administrateur
                    </button>
                    <p class="text-center small-policy mt-4 mb-0">L'utilisation de ce portail est strictement surveillée.</p>
                </div>
            </form>
            
            <div class="text-center mt-5">
                <p class="text-muted mb-0"><a href="login.php" class="text-primary fw-bold text-decoration-none">Retour à la connexion</a></p>
            </div>
        </div>
    </div>
</div>
