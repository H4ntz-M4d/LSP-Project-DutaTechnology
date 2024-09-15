document.addEventListener("DOMContentLoaded", function() {
    // Dapatkan path URL saat ini (misal: /account/settings.html)
    const currentPath = window.location.pathname.split("/").pop();

    // Dapatkan semua tautan menu
    const menuLinks = document.querySelectorAll('.menu-link');

    menuLinks.forEach(link => {
        // Ambil nilai href dari tautan (misal: account/settings.html)
        const linkHref = link.getAttribute('href');

        // Bandingkan linkHref dengan currentPath
        if (linkHref === currentPath) {
            // Tambahkan 'here show' ke parent 'menu-item' dan 'active' ke 'menu-link'
            link.classList.add('active');
            link.closest('.menu-accordion').classList.add('here', 'show');
        }
    });
});
