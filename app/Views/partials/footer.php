<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Psits 2025</div>
                <!-- <div>
                    <a href="#">Privacy Policy</a>
                        &middot;
                            <a href="#">Terms &amp; Conditions</a>
                </div> -->
        </div>
     </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Restore sidebar state
    const activeCollapse = localStorage.getItem('activeCollapse');
    const activeLink = localStorage.getItem('activeLink');

    if (activeCollapse) {
        const collapseEl = document.getElementById(activeCollapse);
        if (collapseEl) {
            new bootstrap.Collapse(collapseEl, {
                toggle: true
            });
        }
    }

    if (activeLink) {
        const activeLinkEl = document.querySelector(`.nav-link[href="${activeLink}"]`);
        if (activeLinkEl) {
            activeLinkEl.classList.add('active');
        }
    }

    // Save clicked nav/collapse item
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function () {
            const href = this.getAttribute('href');
            if (href && href !== '#') {
                localStorage.setItem('activeLink', href);

                // Save parent collapse if exists
                const parentCollapse = this.closest('.collapse');
                if (parentCollapse) {
                    localStorage.setItem('activeCollapse', parentCollapse.id);
                } else {
                    localStorage.removeItem('activeCollapse');
                }
            }
        });
    });
});
</script>

</body>
</html>