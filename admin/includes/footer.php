            </main>
        </div>
    </div>

    <!-- Reusable Bootstrap Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100;">
        <div id="adminToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage">
                    Success message!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Toggler Script and Notification Helper -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sidebar Mobile Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const adminSidebar = document.getElementById('adminSidebar');
            if (sidebarToggle && adminSidebar) {
                sidebarToggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    adminSidebar.classList.toggle('active');
                });
                
                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', (e) => {
                    if (adminSidebar.classList.contains('active') && !adminSidebar.contains(e.target) && e.target !== sidebarToggle) {
                        adminSidebar.classList.remove('active');
                    }
                });
            }

            // Toast Trigger Helper
            const toastEl = document.getElementById('adminToast');
            const bsToast = toastEl ? new bootstrap.Toast(toastEl, { delay: 4000 }) : null;

            window.showNotification = function(message, type = 'success') {
                if (!toastEl || !bsToast) return;
                
                const msgEl = document.getElementById('toastMessage');
                msgEl.innerText = message;
                
                // Clear colors
                toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
                
                // Apply theme color
                if (type === 'success') toastEl.classList.add('bg-success');
                else if (type === 'error' || type === 'danger') toastEl.classList.add('bg-danger');
                else if (type === 'warning') toastEl.classList.add('bg-warning');
                else toastEl.classList.add('bg-info');
                
                bsToast.show();
            };
        });
    </script>
</body>
</html>
