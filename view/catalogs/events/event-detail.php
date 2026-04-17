<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/main.css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/catalog.css" />
    <link rel="icon" type="image/png" href="<?php echo ASSETS_URL; ?>/img/logo.webp" />
    <title>Monogatarya - Evento</title>
</head>

<body>
    <?php include __DIR__ . '/../../includes/clean-header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <article class="card-panel event-layout" aria-labelledby="evento-titulo">
                <section>
                    <h2 id="evento-titulo" class="section-title">Salón Monogatarya 2026</h2>
                    <figure class="event-hero-image">
                        <img src="../assets/gallery/card-onePiece.webp"
                            alt="Escenario principal del evento de manga y anime">
                    </figure>
                    <h3>Descripción</h3>
                    <p>Encuentro anual para lectores, coleccionistas y promotores. Incluye presentaciones de autores,
                        firmas, talleres y zona de exposición.</p>
                </section>
                <aside class="event-aside" aria-labelledby="datos-evento">
                    <h3 id="datos-evento">Datos del evento</h3>
                    <dl>
                        <dt>Fecha</dt>
                        <dd>20/11/2026</dd>
                        <dt>Ubicación</dt>
                        <dd>Fira Barcelona - Pabellón 3</dd>
                        <dt>Aforo</dt>
                        <dd>5.000 asistentes</dd>
                        <dt>Horario</dt>
                        <dd>10:00 - 21:00</dd>
                    </dl>
                    <div class="stack-actions">
                        <a href="event-edit.php" class="btn btn-add">Editar evento</a>
                        <button type="button" class="btn btn-add">Reservar plaza</button>
                        <button type="button" class="btn btn-delete">Anular reserva</button>
                    </div>
                </aside>
            </article>
        </div>
    </main>
    <?php include __DIR__ . '/../../includes/menu.php'; ?>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>

</html>