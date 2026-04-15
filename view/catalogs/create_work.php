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
    <?php require '../includes/clean_header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="crear-evento-title">
                <h2 id="crear-evento-title" class="section-title">Formulario de creación de obra</h2>
                
                <form class="form-vertical" action="../../controller/CatalogController.php" method="post" enctype="multipart/form-data">

                    <div class="field-group">
                        <label for="tipo-obra">Type</label>
                        <select id="tipo-obra" name="type" required>
                            <option value="">Choose an option</option>
                            <option value="Anime">Anime</option>
                            <option value="Manga">Manga</option>
                        </select>
                    </div>
                    <div class="field-group">
                        <label for="title">Work title</label>
                        <input id="title" type="text" name="title" required minlength="3" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="subtitle">Subtitle</label>
                        <input id="subtitle" type="text" name="subtitle" required minlength="5" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="episodes">Number of episodes</label>
                        <input id="episodes" type="number" name="episodes" required min="1">
                    </div>
                    <div class="field-group">
                        <label for="duration">Episode duration (minutes)</label>
                        <input id="duration" type="number" name="duration" required min="1">
                    </div>
                    <div class="field-group">
                        <label for="image">Cover image URL</label>
                        <input id="image" type="text" name="image" required>
                    </div>
                    <div class="field-group">
                        <label for="video">Upload video</label>
                        <input id="video" type="file" name="video" accept="video/*">
                    </div>
                    <div class="field-group">
                        <label for="premiere_date">Premiere date</label>
                        <input id="premiere_date" type="date" name="premiere_date" required>
                    </div>
                    <div class="field-group">
                        <label for="studio">Studio / platform</label>
                        <input id="studio" type="text" name="studio" required>
                    </div>
                    <div class="field-group">
                        <label for="genres">Genres</label>
                        <input id="genres" type="text" name="genres" required>
                    </div>
                    <div class="field-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required minlength="1" maxlength="300"></textarea>
                    </div>

                    <div class="inline-actions">
                        <button type="submit" class="btn btn-add" name="createWork">Crear evento</button>
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
