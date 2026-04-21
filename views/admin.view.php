<div class="row mt-4">
    <div class="col-12 animate-fade-in">
        <div class="glass-card p-4 p-md-5">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-4 mb-4 mb-md-5">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box mb-0">
                        <i data-lucide="layout-dashboard"></i>
                    </div>
                    <h2 class="fw-bold mb-0">Gestion Administrative</h2>
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-3 w-100 w-lg-auto">
                    <a href="add_user.php" class="btn btn-primary rounded-pill d-flex justify-content-center align-items-center gap-2 shadow-sm">
                        <i data-lucide="user-plus"></i>
                        <span>Créer un compte</span>
                    </a>
                    <div class="bg-primary bg-opacity-10 text-primary px-4 py-2 rounded-pill d-flex justify-content-center align-items-center gap-2 shadow-sm border border-primary border-opacity-20">
                        <i data-lucide="users"></i>
                        <span><?= count($users) ?> Utilisateurs</span>
                    </div>
                </div>
            </div>

            <div class="rounded-4 border border-primary border-opacity-10 shadow-sm bg-white overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="min-width: 800px;">
                        <thead class="bg-primary bg-opacity-10">
                            <tr>
                            <th class="border-0 px-4 py-3">Utilisateur</th>
                            <th class="border-0 py-3">Email</th>
                            <th class="border-0 py-3">Rôle</th>
                            <th class="border-0 py-3">Statut</th>
                            <th class="border-0 py-3">Date d'inscription</th>
                            <th class="border-0 text-end px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php foreach ($users as $u): ?>
                            <tr class="border-white border-opacity-5">
                                <td class="px-4 py-3 border-0">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar bg-primary bg-opacity-10 rounded-circle text-primary d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; border: 1px solid rgba(14, 165, 233, 0.2);">
                                            <i data-lucide="user"></i>
                                        </div>
                                        <span class="fw-bold"><?= htmlspecialchars($u['username']) ?></span>
                                    </div>
                                </td>
                                <td class="text-muted border-0"><?= htmlspecialchars($u['email']) ?></td>
                                <td class="border-0">
                                    <span class="badge bg-<?= $u['role'] === 'admin' ? 'danger' : 'primary' ?> bg-opacity-10 text-<?= $u['role'] === 'admin' ? 'danger' : 'primary' ?> px-3 py-1 rounded-pill border border-<?= $u['role'] === 'admin' ? 'danger' : 'primary' ?> border-opacity-20">
                                        <?= ucfirst($u['role']) ?>
                                    </span>
                                </td>
                                <td class="border-0">
                                    <?php if ($u['is_active'] == 1): ?>
                                        <span class="badge bg-success bg-opacity-15 text-success px-3 py-1 rounded-pill border border-success border-opacity-25">
                                            <i data-lucide="check-circle" class="me-1"></i> Actif
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-primary bg-opacity-10 text-muted px-3 py-1 rounded-pill border border-primary border-opacity-10">
                                            <i data-lucide="minus-circle" class="me-1"></i> Inactif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-muted small border-0"><?= date('d/m/Y', strtotime($u['created_at'])) ?></td>
                                <td class="text-end px-4 border-0">
                                    <?php if ($u['id'] != $_SESSION['user_id']): ?>
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="edit_user.php?id=<?= $u['id'] ?>" class="btn btn-outline-info btn-sm rounded-pill px-3 py-1 border-opacity-25">
                                                <i data-lucide="edit-3" class="small"></i> Modifier
                                            </a>
                                            <form action="actions/admin_action.php" method="POST" class="d-inline">
                                                <input type="hidden" name="action" value="toggle_status">
                                                <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                                <input type="hidden" name="is_active" value="<?= $u['is_active'] ?>">
                                                <button type="submit" class="btn btn-outline-<?= $u['is_active'] == 1 ? 'warning' : 'success' ?> btn-sm rounded-pill px-3 py-1 border-opacity-25">
                                                    <i data-lucide="<?= $u['is_active'] == 1 ? 'ban' : 'play-circle' ?>" class="small"></i> 
                                                    <?= $u['is_active'] == 1 ? 'Désactiver' : 'Réactiver' ?>
                                                </button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-primary bg-opacity-10 text-primary fw-normal px-3 py-1 rounded-pill border border-primary border-opacity-20 shadow-sm">Boss</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
