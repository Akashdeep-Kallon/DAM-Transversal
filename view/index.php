<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/main.css" />
    <link rel="stylesheet" href="assets/styles/index.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp"/>
    <title>Monogatarya - Página principal</title>
</head>

<body>
    <?php require 'includes/clean_header.php'; ?>

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
            <section class="card-panel" aria-labelledby="events-title">
                <h2 id="events-title" class="section-title">8 eventos destacados</h2>
                <div class="event-grid-4">
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-otacun.webp" alt="Cartel Festival del OTACUN 2024">
                        <h3>Festival del OTACUN 2024</h3>
                        <p>Encuentro de fans con talleres, cosplay y firma de artistas.</p>
                        <a class="btn-link" href="events/event-detail.html">Información detallada</a>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-manga-barcelona.webp"
                            alt="Cartel Festival del 31 Mangas Barcelona 2025">
                        <h3>31 Mangas BARCELONA 2025</h3>
                        <p>Exposición de mangas independientes y firma de autores.</p>
                        <a class="btn-link" href="events/event-detail-2.html">Información detallada</a>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-shingekyNoKyojin.webp" alt="Debate Titans Debate Live">
                        <h3>Titans Debate Live</h3>
                        <p>Debate crítico sobre narrativa y dirección de anime.</p>
                        <button class="btn-link btn-muted" type="button" disabled>Próximamente</button>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-storyboardjpg.jpg" alt="Taller de storyboard de manga">
                        <h3>Masterclass Storyboard</h3>
                        <p>Composición visual, ritmo y narrativa para manga.</p>
                        <button class="btn-link btn-muted" type="button" disabled>Próximamente</button>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-cine.webp" alt="Cine anime nocturno">
                        <h3>Cine Nocturno Anime</h3>
                        <p>Proyecciones con subtítulos descriptivos y acceso adaptado.</p>
                        <button class="btn-link btn-muted" type="button" disabled>Próximamente</button>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-retro.png" alt="Zona de videojuegos anime retro">
                        <h3>Retro Otaku Game Day</h3>
                        <p>Competición retro con zonas de descanso sensorial.</p>
                        <button class="btn-link btn-muted" type="button" disabled>Próximamente</button>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-artist.webp" alt="Artist Alley solidario">
                        <h3>Artist Alley Solidari</h3>
                        <p>Fanzines e ilustración indie para causas sociales.</p>
                        <button class="btn-link btn-muted" type="button" disabled>Próximamente</button>
                    </article>
                    <article class="content-card event-card">
                        <img src="assets/gallery/card-anime-voice.jpg" alt="Conferencia de doblaje anime">
                        <h3>Anime Voice Summit</h3>
                        <p>Charlas de doblaje y demostraciones en directo.</p>
                        <button class="btn-link btn-muted" type="button" disabled>Próximamente</button>
                    </article>
                </div>
            </section>
        </div>
    </main>
    <?php require 'includes/menu.php'; ?>
    <?php require 'includes/footer.php'; ?>
</body>

</html>