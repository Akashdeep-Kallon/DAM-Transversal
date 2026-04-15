<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<input type="checkbox" id="menu-toggle">

<ul class="menu-width">
    <li><a href="/DAM-Transversal/view/index.php">Página de inicio</a></li>

    <li><a href="/DAM-Transversal/view/catalogs/anime/anime-catalog.php">
            Catálogo de animes
        </a></li>

    <li><a href="/DAM-Transversal/view/catalogs/manga/manga-catalog.php">
            Catálogo de mangas
        </a></li>

    <li><a href="/DAM-Transversal/view/events/event-detail.php">
            Eventos
        </a></li>

    <?php if (isset($_SESSION['usuario'])): ?>
        <li class="logout">
            <form action="/DAM-Transversal/controller/UserController.php" method="POST">
                <input type="hidden" name="logout">
                <button type="submit">Cerrar sesión</button>
            </form>
        </li>
    <?php endif; ?>
</ul>