    </main>
    <footer class="container py-4 mt-5 border-top">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted small mb-0">&copy; <?= date('Y') ?> Gestion des Utilisateurs. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>lucide.createIcons();</script>
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
