<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0 gradient-text">Modifier l'Utilisateur</h2>
                        <p class="text-muted mb-0">Édition du profil de : <?= htmlspecialchars($target_user['username']) ?></p>
                    </div>
                </div>
                <a href="admin.php" class="btn btn-outline-light rounded-pill px-4">
                    <i class="bi bi-arrow-left me-2"></i> Retour
                </a>
            </div>
            
            <form action="actions/admin_edit_user_action.php" method="POST" class="needs-validation">
                <input type="hidden" name="user_id" value="<?= $target_user['id'] ?>">

                <div class="row">
                    <!-- Section 1: Identifiants -->
                    <div class="col-md-12 mb-4">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 d-flex align-items-center">
                            <i class="bi bi-fingerprint me-2 text-primary"></i>Informations de compte
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Nom Complet</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($target_user['full_name']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Nom d'utilisateur</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-at"></i></span>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($target_user['username']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Adresse Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($target_user['email']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($target_user['phone']) ?>" required>
                        </div>
                    </div>

                    <!-- Section 2: Détails du Profil -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 d-flex align-items-center">
                            <i class="bi bi-person-vcard me-2 text-primary"></i>Informations personnelles
                        </h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Date de naissance</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                            <input type="date" name="birth_date" class="form-control" value="<?= htmlspecialchars($target_user['birth_date']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label required">Adresse Résidentielle</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($target_user['address']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Ville</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($target_user['city']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Pays</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                            <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($target_user['country']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Biographie</label>
                        <textarea name="bio" class="form-control" rows="3"><?= htmlspecialchars($target_user['bio']) ?></textarea>
                    </div>

                    <!-- Section 3: Privilèges Admin -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 d-flex align-items-center">
                            <i class="bi bi-shield-shaded me-2 text-primary"></i>Privilèges et Statut
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Rôle utilisateur</label>
                        <select name="role" class="form-select" required>
                            <option value="user" <?= $target_user['role'] === 'user' ? 'selected' : '' ?>>Utilisateur Standard</option>
                            <option value="admin" <?= $target_user['role'] === 'admin' ? 'selected' : '' ?>>Administrateur</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Statut</label>
                        <select name="is_active" class="form-select" required>
                            <option value="1" <?= $target_user['is_active'] == 1 ? 'selected' : '' ?>>Actif (Accès autorisé)</option>
                            <option value="0" <?= $target_user['is_active'] == 0 ? 'selected' : '' ?>>Inactif (Compte supprimé/bloqué)</option>
                        </select>
                    </div>

                    <!-- Section 4: Réinitialisation Mot de passe -->
                    <div class="col-md-12 mb-4 mt-4 p-4 rounded-4" style="background: rgba(239, 68, 68, 0.05); border: 1px solid rgba(239, 68, 68, 0.2);">
                        <h5 class="fw-bold text-danger mb-3 d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>Zone Sensible : Réinitialisation
                        </h5>
                        <p class="text-muted small mb-3">Laissez vide si vous ne souhaitez pas modifier le mot de passe de l'utilisateur.</p>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nouveau mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger bg-opacity-10 border-danger border-opacity-25 text-danger"><i class="bi bi-key"></i></span>
                                    <input type="password" name="new_password" class="form-control border-danger border-opacity-25" placeholder="Nouveau mot de passe">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirmation</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger bg-opacity-10 border-danger border-opacity-25 text-danger"><i class="bi bi-shield-check"></i></span>
                                    <input type="password" name="confirm_new_password" class="form-control border-danger border-opacity-25" placeholder="Confirmez">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow-lg py-3">
                        <i class="bi bi-save me-2"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
