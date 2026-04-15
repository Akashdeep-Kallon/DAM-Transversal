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
                <h2 id="crear-evento-title" class="section-title">Formulario de creación de evento de anime</h2>
                
                <form class="form-vertical" action="../../../controller/CatalogController.php" method="post" enctype="multipart/form-data">

                    <div class="field-group">
                        <label for="nombre-anime">Título del anime</label>
                        <input id="nombre-anime" type="text" name="A_titulo" required minlength="3" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="subtitulo-anime">Subtitulo del anime</label>
                        <input id="subtitulo-anime" type="text" name="A_subtitulo" required minlength="5" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="subtitulo-anime">Numero de episodios</label>
                        <input id="subtitulo-anime" type="text" name="A_episodios" required min="1">
                    </div>
                    <div class="field-group">
                        <label for="subtitulo-anime">Duracion de episodios(minutos)</label>
                        <input id="subtitulo-anime" type="text" name="A_duracion" required min="1">
                    </div>
                    <div class="field-group">
                        <label for="subtitulo-anime">Link de Img portada</label>
                        <input id="subtitulo-anime" type="text" name="A_imagen" required>
                    </div>
                    <div class="field-group">
                        <label for="subtitulo-anime">Subir video</label>
                        <input id="subtitulo-anime" type="file" name="A_video" accept="video/*">
                    </div>
                    <div class="field-group">
                        <label for="fecha-estreno">Fecha de estreno</label>
                        <input id="fecha-estreno" type="date" name="A_fecha_estreno" required>
                    </div>
                    <div class="field-group">
                        <label for="fecha-estreno">Estudio / plataforma</label>
                        <input id="fecha-estreno" type="text" name="A_estudio" required>
                    </div>
                    <div class="field-group">
                        <label for="fecha-estreno">Generos</label>
                        <input id="fecha-estreno" type="text" name="A_generos" required>
                    </div>
                    <div class="field-group">
                        <label for="descripcion-evento">Descripcion</label>
                        <textarea id="descripcion-evento" name="A_descripcion" required minlength="1" maxlength="300"></textarea>
                    </div>

                    <div class="inline-actions">
                        <button type="submit" class="btn btn-add" name="crearAnime">Crear evento</button>
                        <button type="reset" class="btn btn-delete" name="cancelar">Cancelar</button>
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
