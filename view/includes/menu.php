<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/config.php';
?>

<input type="checkbox" id="menu-toggle">

<ul class="menu-sidebar">
    <li><a href="/DAM-Transversal/view/index.php">Página de inicio</a></li>

    <li><a href="/DAM-Transversal/view/catalogs/anime/anime-catalog.php">
            Catálogo de Animes
        </a></li>

    <li><a href="/DAM-Transversal/view/catalogs/manga/manga-catalog.php">
            Catálogo de Mangas
        </a></li>

    <li><a href="/DAM-Transversal/view/catalogs/events/event-catalog.php">
            Catálogo de Eventos
        </a></li>

    <?php if (!isset($_SESSION['status']) || $_SESSION['status'] != 1){ ?>
        <li class="logout">
            <form action="/DAM-Transversal/controller/UserController.php" method="POST">
                <input type="hidden" name="logout">
                <button type="submit">Cerrar sesión</button>
            </form>
        </li>
    <?php } ?>
</ul>