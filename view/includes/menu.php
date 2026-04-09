<input type="checkbox" id="menu-toggle">

    <ul class="menu-width">
        <li><a href="index.php">Página de inicio</a></li>
        <li><a href="catalogs/anime/anime-catalog.html">Catálogo de animes</a></li>
        <li><a href="catalogs/manga/manga-catalog.html">Catálogo de mangas</a></li>
        <li><a href="events/event-detail.html">Eventos</a></li>
        <li class="logout">
            <form action="../controller/UserController.php" method="POST">
                <input type="hidden" name="logout">
                <button type="submit">Cerrar sesión</button>
            </form>
        </li>
    </ul>
