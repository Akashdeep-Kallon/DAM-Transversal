<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/event.css" />
    <link rel="stylesheet" href="../assets/styles/main.css" />
    <title>Monogatarya - Crear Evento</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="crear-evento-title">
                <h2 id="crear-evento-title" class="section-title">Formulario de gestión de evento</h2>
                <form class="form-vertical" action="event-detail.html" method="post">

                    <div class="field-group">
                        <label for="nombre-evento">Título del evento</label>
                        <input id="nombre-evento" type="text" name="nombre" required minlength="3" maxlength="50">
                    </div>
                    <div class="field-group">
                        <label for="fecha-evento">Fecha</label>
                        <input id="fecha-evento" type="date" name="fecha" required>
                    </div>
                    <div class="field-group">
                        <label for="lugar-evento">Lugar</label>
                        <input id="lugar-evento" type="text" name="lugar" required minlength="3">
                    </div>
                    <div class="field-group">
                        <label for="aforo">Aforo</label>
                        <input id="aforo" type="number" name="aforo" min="50" required>
                    </div>
                    <div class="field-group">
                        <label for="descripcion-evento">Descripción</label>
                        <textarea id="descripcion-evento" name="descripcion" required minlength="10"
                            maxlength="300"></textarea>
                    </div>
                    <div class="field-group">
                        <label for="imagen">Imagen del evento</label>
                        <input id="imagen" type="file" name="imagen" accept="image/*" required>
                    </div>
                    <div class="inline-actions">
                        <button type="submit" class="btn btn-add">Publicar evento</button>
                        <button type="reset" class="btn btn-delete">Cancelar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <?php require '../includes/menu.php'; ?>
    <?php require '../includes/footer.php'; ?>
</body>

</html>