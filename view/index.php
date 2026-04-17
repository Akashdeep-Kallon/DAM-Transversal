<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/main.css" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/index.css" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/catalog.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Página principal</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/clean-header.php'; ?>

    <main class="page-main" id="contenido-principal">
        <div class="layout-container">
            <section class="card-panel home-hero" aria-labelledby="hero-title">
                <div>
                    <h2 id="hero-title">Bienvenido a Monogatarya</h2>
                    <p>Descubre novedades de manga y anime, gestiona tu perfil y reserva eventos desde una experiencia
                        responsive y accesible.</p>
                    <div class="inline-actions">
                        <a class="btn-link" href="catalogs/events/event-detail.php">Ver evento destacado</a>
                        <a class="btn-link" href="catalogs/anime/anime-catalog.php">Explorar catálogo</a>
                    </div>
                </div>
                <div class="gallery" aria-label="Galería destacada">
                    <input type="radio" name="slider" id="s1" checked>
                    <input type="radio" name="slider" id="s2">
                    <input type="radio" name="slider" id="s3">
                    <div class="cards">
                        <label for="s1" class="card" aria-label="Mostrar portada de One Piece">
                            <img src="/DAM-Transversal/view/assets/gallery/card-onePiece.webp" alt="Portada de One Piece">
                        </label>
                        <label for="s2" class="card" aria-label="Mostrar portada de Dragon Ball Z">
                            <img src="/DAM-Transversal/view/assets/gallery/card-dragonBall.webp" alt="Portada de Dragon Ball Z">
                        </label>
                        <label for="s3" class="card" aria-label="Mostrar portada de Attack on Titan">
                            <img src="/DAM-Transversal/view/assets/gallery/card-shingekyNoKyojin.webp" alt="Portada de Attack on Titan">
                        </label>
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

            <?php require $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/catalogs/events/event-global-catalog.php'; ?>

        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/footer.php'; ?>
</body>

</html>