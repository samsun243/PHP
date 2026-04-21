<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box">
                        <i data-lucide="user-plus"></i>
                    </div>
                    <h2 class="fw-bold mb-0 gradient-text">Ajouter un Utilisateur</h2>
                </div>
                <a href="admin.php" class="btn btn-outline-primary rounded-pill px-4">
                    <i data-lucide="arrow-left" class="me-2"></i> Retour
                </a>
            </div>
            
            <form action="actions/admin_add_user_action.php" method="POST" class="needs-validation">
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
                            <input type="text" name="full_name" class="form-control" placeholder="Jean Dupont" required>
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
                        <label class="form-label">Biographie</label>
                        <textarea name="bio" class="form-control" rows="3" placeholder="Notes optionnelles..."></textarea>
                    </div>

                    <!-- Section 3: Privilèges Admin -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 d-flex align-items-center">
                            <i data-lucide="shield" class="me-2 text-primary"></i>Privilèges et Statut
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Rôle utilisateur</label>
                        <select name="role" class="form-select" required>
                            <option value="user" selected>Utilisateur Standard</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Statut initial</label>
                        <select name="is_active" class="form-select" required>
                            <option value="1" selected>Actif (Accès autorisé)</option>
                            <option value="0">Inactif (Accès bloqué)</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg py-3">
                        <i data-lucide="user-check" class="me-2"></i> Créer l'utilisateur
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
