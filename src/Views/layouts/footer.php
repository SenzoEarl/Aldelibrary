<?php
/**
 * Layout Footer Component
 *
 * Closes content containers, provides copyright footer section,
 * and attaches Bootstrap and custom JavaScript files.
 *
 * @author Senzo Earl Maseko
 */
?>
    </main>
    <!-- End Main Container -->

    <!-- Page Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto shadow-sm">
        <div class="container">
            <p class="mb-0 text-secondary small">
                Engineered with precision by <span class="text-light fw-semibold">Senzo Earl Maseko</span> &copy; <?php echo date('Y'); ?>
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Application JavaScript File -->
    <script src="assets/js/app.js"></script>
</body>
</html>