    </main>
    <footer class="container py-5 mt-5 border-top">
        <div class="row gy-4">
            <div class="col-lg-6 text-center text-lg-start">
                <a class="navbar-brand d-inline-flex align-items-center mb-3" href="index.php">
                    <div class="logo-icon me-2" style="width: 32px; height: 32px; font-size: 1rem;">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <span class="fs-5 fw-bold gradient-text">UserDev</span>
                </a>
                <p class="text-muted small mb-0">La solution ultime pour la gestion sécurisée de vos utilisateurs. <br>Conçu avec passion pour les développeurs exigeants.</p>
            </div>
            <div class="col-lg-6 text-center text-lg-end">
                <div class="social-links mb-3">
                    <a href="#" class="btn btn-light btn-sm rounded-circle mx-1"><i class="bi bi-github"></i></a>
                    <a href="#" class="btn btn-light btn-sm rounded-circle mx-1"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-light btn-sm rounded-circle mx-1"><i class="bi bi-linkedin"></i></a>
                </div>
                <p class="text-muted small mb-0">&copy; <?= date('Y') ?> UserDev Premium Services. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php if (isset($_SESSION['toasts'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                <?php foreach ($_SESSION['toasts'] as $toast): ?>
                    createToast('<?= $toast['type'] ?>', '<?= addslashes($toast['message']) ?>');
                <?php endforeach; ?>
            });
        </script>
        <?php unset($_SESSION['toasts']); ?>
    <?php endif; ?>
</body>
</html>
