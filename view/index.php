<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="assets/styles/main.css" />
    <link rel="stylesheet" href="assets/styles/index.css" />
    <title>Monogatarya - Página principal</title>
</head>

<body>
    <header>
        <div class="header-gruop">
            <label for="menu-toggle" class="icon-btn white" aria-label="Menú">
                <svg class="icon">
                    <use href="assets/img/icon-sprites.svg#menu"></use>
                </svg>
            </label>
            <img src="assets/img/logo.webp" alt="Logo de la página">
            <h1>MONOGATARYA</h1>
            <div class="right-group">
                <form action="" autocomplete="on" method="get">
                    <div class="search">
                        <button class="icon-btn red" aria-label="Buscar">
                            <svg class="icon">
                                <use href="assets/img/icon-sprites.svg#buscar"></use>
                            </svg>
                        </button>

                        <input class="search-input" type="search" name="busqueda" placeholder="Search" required
                            minlength="2" maxlength="40">

                        <button class="icon-btn red" aria-label="Micrófono">
                            <svg class="icon">
                                <use href="assets/img/icon-sprites.svg#microfono"></use>
                            </svg>
                        </button>
                    </div>
                </form>
                <a href="profiles/profile-view.html" class="icon-btn white user-link"
                    aria-label="Ir al perfil de usuario">
                    <svg class="icon">
                        <use href="assets/img/icon-sprites.svg#usuario"></use>
                    </svg>
                </a>
            </div>
        </div>
    </header>


    <main class="page-main" id="contenido-principal">
        <div class="layout-container">
            <section class="card-panel home-hero" aria-labelledby="hero-title">
                <div>
                    <h2 id="hero-title">Bienvenido a Monogatarya</h2>
                    <p>Descubre novedades de manga y anime, gestiona tu perfil y reserva eventos desde una experiencia
                        responsive y accesible.</p>
                    <div class="inline-actions">
                        <a class="btn-link" href="events/event-detail.html">Ver evento destacado</a>
                        <a class="btn-link" href="catalogs/anime/anime-catalog.html">Explorar catálogo</a>
                    </div>
                </div>
                <div class="gallery" aria-label="Galería destacada">
                    <input type="radio" name="slider" id="s1" checked>
                    <input type="radio" name="slider" id="s2">
                    <input type="radio" name="slider" id="s3">
                    <div class="cards">
                        <label for="s1" class="card" aria-label="Mostrar portada de One Piece">
                            <img src="assets/gallery/card-onePiece.webp" alt="Portada de One Piece">
                        </label>
                        <label for="s2" class="card" aria-label="Mostrar portada de Dragon Ball Z">
                            <img src="assets/gallery/card-dragonBall.webp" alt="Portada de Dragon Ball Z">
                        </label>
                        <label for="s3" class="card" aria-label="Mostrar portada de Attack on Titan">
                            <img src="assets/gallery/card-shingekyNoKyojin.webp" alt="Portada de Attack on Titan">
                        </label>
                    </div>
                    <div class="gallery-controls" aria-label="Controles de galería">
                        <label for="s1" title="One Piece"></label>
                        <label for="s2" title="Dragon Ball"></label>
                        <label for="s3" title="Attack on Titan"></label>
                    </div>
                </div>
            </section>

            <section class="card-panel" aria-labelledby="ultimos-title">
                <h2 id="ultimos-title" class="section-title">Últimos lanzamientos</h2>
                <div class="card-grid card-grid-3">
                    <article class="content-card">
                        <h3>One Piece 112</h3>
                        <p>Nuevo arco argumental con edición especial y análisis editorial.</p>
                    </article>
                    <article class="content-card">
                        <h3>Dragon Ball Daima</h3>
                        <p>Nueva temporada disponible con calendario completo de emisión.</p>
                    </article>
                    <article class="content-card">
                        <h3>Shingeki Final</h3>
                        <p>Reedición coleccionista y debate de comunidad en el próximo evento.</p>
                    </article>
                </div>
            </section>
        </div>
    </main>

    <input type="checkbox" id="menu-toggle">

    <ul class="menu-width">
        <li><a href="index.php">Página de inicio</a></li>
        <li><a href="catalogs/anime/anime-catalog.html">Catálogo de animes</a></li>
        <li><a href="catalogs/manga/manga-catalog.html">Catálogo de mangas</a></li>
        <li><a href="events/event-detail.html">Eventos</a></li>
        <li class="logout">
            <form action="../controller/UserController.php" method="POST">
                <input type="hidden" name="action" value="logout">
                <button type="submit">Cerrar sesión</button>
            </form>
        </li>
    </ul>

    <footer>
        <div class="container">© 2026 Monogatarya. Todos los derechos reservados.</div>
    </footer>

</body>

</html>