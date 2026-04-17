<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<footer class="site-footer">
    <nav class="container" aria-label="Mapa web del sitio">
        <ul class="footer-links">
            <li><a href="/DAM-Transversal/view/index.php">Inicio</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="/DAM-Transversal/view/profiles/profile.php">Perfil</a></li>
            <?php endif; ?>
            <li><a href="/DAM-Transversal/view/catalogs/anime/anime-catalog.php">Catálogo de animes</a></li>
            <li><a href="/DAM-Transversal/view/catalogs/manga/manga-catalog.php">Catálogo de mangas</a></li>
            <li><a href="/DAM-Transversal/view/events/event-detail.php">Eventos</a></li>
            <li><a href="/DAM-Transversal/view/home.html">Home</a></li>
        </ul>
    </nav>
    <p class="footer-legal">© 2026 Monogatarya. Todos los derechos reservados.</p>
</footer>