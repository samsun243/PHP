<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="text-center mb-5">
                <div class="icon-box mx-auto">
                    <i data-lucide="user-plus"></i>
                </div>
                <h2 class="fw-bold gradient-text">Rejoindre UserDev</h2>
                <p class="text-muted">Créez votre compte en quelques secondes.</p>
            </div>
            
            <form action="actions/register_action.php" method="POST" class="needs-validation">
                <div class="row">
                    <!-- Section 1: Identifiants -->
                    <div class="col-md-12 mb-4">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 d-flex align-items-center">
                            <i data-lucide="fingerprint" class="me-2 text-primary"></i>Informations de compte
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Nom Complet</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="user"></i></span>
                            <input type="text" name="full_name" class="form-control" placeholder="Ex: Jean Dupont" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Nom d'utilisateur</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="at-sign"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="jdupont" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Adresse Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="mail"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="jean@exemple.com" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="phone"></i></span>
                            <input type="tel" name="phone" class="form-control" placeholder="+33 6 12 34 56 78" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Confirmation</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="shield-check"></i></span>
                            <input type="password" name="confirm_password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Section 2: Détails du Profil -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 d-flex align-items-center">
                            <i data-lucide="contact" class="me-2 text-primary"></i>Informations personnelles
                        </h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Date de naissance</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="calendar"></i></span>
                            <input type="date" name="birth_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label required">Adresse Résidentielle</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="map-pin"></i></span>
                            <input type="text" name="address" class="form-control" placeholder="123 Rue de la Paix" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Ville</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="building-2"></i></span>
                            <input type="text" name="city" class="form-control" placeholder="Paris" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Pays</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="globe"></i></span>
                            <input type="text" name="country" class="form-control" placeholder="France" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label required">Biographie (À propos de vous)</label>
                        <textarea name="bio" class="form-control" rows="3" placeholder="Parlez-nous un peu de vous..." required></textarea>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg py-3">
                        Créer mon compte premium <i data-lucide="check-circle" class="ms-2"></i>
                    </button>
                    <p class="text-center small-policy mt-4 mb-0">En vous inscrivant, vous acceptez nos <a href="#" class="text-decoration-none">Conditions d'utilisation</a>.</p>
                </div>
            </form>
            
            <div class="text-center mt-5">
                <p class="text-muted mb-0">Déjà un compte ? <a href="login.php" class="text-primary fw-bold text-decoration-none">Se connecter maintenant</a></p>
            </div>
        </div>
    </div>
</div>
