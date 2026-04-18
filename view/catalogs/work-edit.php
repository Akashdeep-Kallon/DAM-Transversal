<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/auth.php';
requireRole('promoter');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/main.css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/catalog.css" />
    <link rel="icon" type="image/png" href="<?php echo ASSETS_URL; ?>/img/logo.webp" />
    <title>Monogatarya - Editar Obra</title>
</head>

<body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="crear-evento-title">
                <h2 id="crear-evento-title" class="section-title">Formulario de creación de obra</h2>

                <form class="form-vertical" action="<?php echo CONTROLLER_URL; ?>/CatalogController.php" method="post"
                    enctype="multipart/form-data">

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
                        <input id="title" type="text" name="title" required minlength="5" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="subtitle">Subtitle</label>
                        <input id="subtitle" type="text" name="subtitle" required minlength="5" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="episodes">Number of episodes</label>
                        <input id="episodes" type="number" name="chapters" required min="1">
                    </div>
                    <div class="field-group">
                        <label for="image">Cover image URL</label>
                        <input id="image" type="text" name="image">
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
                        <label for="gender">Gender</label>
                        <input id="gender" type="text" name="gender" required>
                    </div>
                    <div class="field-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required minlength="1" maxlength="300"></textarea>
                    </div>

                    <div class="inline-actions">
                        <button type="submit" class="btn btn-add" name="create_work">Publicar obra</button>
                        <button type="reset" class="btn btn-delete" name="cancelar">Cancelar</button>
                    </div>
                </form>

            </section>
        </div>
    </main>

    <input type="checkbox" id="menu-toggle">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/footer.php'; ?>

</body>

</html>