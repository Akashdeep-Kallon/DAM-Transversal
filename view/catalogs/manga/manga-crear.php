<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/styles/event.css" />
    <link rel="stylesheet" href="../../assets/styles/main.css" />
    <title>Monogatarya - Crear Evento de Anime</title>
</head>

<body>
    <?php require '../../includes/header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="crear-evento-title">
                <h2 id="crear-evento-title" class="section-title">Formulario de creación de evento de maga</h2>
                <form class="form-vertical" action="../../events/event-detail.html" method="post">

                    <div class="field-group">
                        <label for="nombre-anime">Título del manga</label>
                        <input id="nombre-anime" type="text" name="nombre" required minlength="3" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="fecha-estreno">Fecha de estreno</label>
                        <input id="fecha-estreno" type="date" name="fecha_estreno" required>
                    </div>
                    <div class="field-group">
                        <label for="estudio-anime">Estudio / plataforma</label>
                        <input id="estudio-anime" type="text" name="estudio" required minlength="3">
                    </div>
                    <div class="field-group">
                        <label for="temporada-anime">Temporada</label>
                        <input id="temporada-anime" type="number" name="temporada" min="1" required>
                    </div>
                    <div class="field-group">
                        <label for="descripcion-evento">Sinopsis</label>
                        <textarea id="descripcion-evento" name="descripcion" required minlength="10" maxlength="300"></textarea>
                    </div>
                    <div class="field-group">
                        <label for="imagen">Portada del anime</label>
                        <input id="imagen" type="file" name="imagen" accept="image/*" required>
                    </div>
                    <div class="inline-actions">
                        <button type="submit" class="btn btn-add">Crear evento</button>
                        <button type="reset" class="btn btn-delete">Cancelar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <input type="checkbox" id="menu-toggle">

    <?php require '../../includes/menu.php'; ?>
    <?php require '../../includes/footer.php'; ?>

</body>

</html>
