<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-9 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box">
                        <i data-lucide="settings"></i>
                    </div>
                    <h2 class="fw-bold mb-0 gradient-text">Mon Profil Premium</h2>
                </div>
                <span class="badge bg-<?= $user['role'] === 'admin' ? 'danger' : 'primary' ?> px-4 py-2 rounded-pill fs-6 shadow-sm">
                   <i data-lucide="shield-check" class="me-1"></i> <?= ucfirst($user['role']) ?>
                </span>
            </div>

            <form action="actions/profile_action.php" method="POST">
                <div class="row">
                    <!-- Section Account -->
                    <div class="col-md-12 mb-4">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 text-primary"><i data-lucide="user" class="me-2"></i>Compte</h5>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Nom Complet</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="user"></i></span>
                            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Nom d'utilisateur</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="at-sign"></i></span>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Adresse Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="mail"></i></span>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label required">Téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="phone"></i></span>
                            <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>" required>
                        </div>
                    </div>

                    <!-- Section Personal -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 text-primary"><i class="bi bi-person-vcard me-2"></i>Informations Personnelles</h5>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label required">Date de naissance</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                            <input type="date" name="birth_date" class="form-control" value="<?= $user['birth_date'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label required">Ville</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($user['city']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label required">Pays</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                            <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($user['country']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label required">Adresse</label>
                        <div class="input-group">
                            <span class="input-group-text"><i data-lucide="map-pin"></i></span>
                            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($user['address']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="form-label required">Biographie</label>
                        <textarea name="bio" class="form-control" rows="3" required><?= htmlspecialchars($user['bio']) ?></textarea>
                    </div>

                    <!-- Section Security -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 text-primary"><i class="bi bi-lock me-2"></i>Sécurité</h5>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nouveau mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                            <input type="password" name="new_password" class="form-control" placeholder="Laisser vide pour garder l'actuel">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Confirmer le nouveau</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirmer le nouveau">
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4 d-flex flex-wrap gap-3">
                    <button type="submit" name="update_profile" class="btn btn-primary px-5 shadow-lg">
                        <i data-lucide="save" class="me-2"></i> Enregistrer les modifications
                    </button>
                    <button type="button" class="btn btn-outline-danger px-4 border-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i data-lucide="trash-2" class="me-2"></i> Supprimer le compte
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 glass-card">
            <div class="modal-body p-5 text-center">
                <div class="text-danger mb-4">
                    <i data-lucide="alert-triangle" style="width: 64px; height: 64px;"></i>
                </div>
                <h4 class="fw-bold mb-3">Supprimer mon compte ?</h4>
                <p class="text-muted">Cette action est définitive. Vous perdrez l'accès à toutes vos données instantanément.</p>
                <div class="d-flex gap-3 justify-content-center mt-4">
                    <button type="button" class="btn btn-light px-4 rounded-pill" data-bs-dismiss="modal">Annuler</button>
                    <form action="actions/profile_action.php" method="POST">
                        <button type="submit" name="delete_account" class="btn btn-danger px-4 rounded-pill shadow">
                            Confirmer la suppression
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
