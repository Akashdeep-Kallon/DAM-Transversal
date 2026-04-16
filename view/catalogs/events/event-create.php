<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/event.css" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/main.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Publicar Evento</title>
</head>

<body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/clean-header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="crear-evento-title">

                <h2 id="crear-evento-title" class="section-title">Formulario de gestión de evento</h2>

                <form class="form-vertical" action="/DAM-Transversal/controller/CatalogController.php" method="post">

                    <div class="field-group">
                        <label for="nombre-evento">Título</label>
                        <input id="nombre-evento" type="text" name="title" required minlength="3" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="subtitle">Subtítulo</label>
                        <input id="subtitle" type="text" name="subtitle" required minlength="5" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="fecha-evento">Fecha</label>
                        <input id="fecha-evento" type="date" name="date_event" required>
                    </div>
                    <div class="field-group">
                        <label for="lugar-evento">Lugar</label>
                        <input id="lugar-evento" type="text" name="location" required minlength="3">
                    </div>
                    <div class="field-group">
                        <label for="aforo">Aforo</label>
                        <input id="aforo" type="number" name="capacity" min="50" required>
                    </div>
                    <div class="field-group">
                        <label for="image">Imagen en URL</label>
                        <input id="image" type="text" name="image" required>
                    </div>
                    <div class="field-group">
                        <label for="descripcion-evento">Descripción</label>
                        <textarea id="descripcion-evento" name="description" required minlength="10"
                            maxlength="300"></textarea>
                    </div>
                    <div class="inline-actions">
                        <button type="submit" class="btn btn-add" name="create_event">Publicar evento</button>
                        <button type="reset" class="btn btn-delete">Cancelar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/footer.php'; ?>

</body>

</html>