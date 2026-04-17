<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/main.css" />
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/catalog.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Eventos</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/header.php'; ?>
    <main class="page-main">
        <div class="layout-container">

            <?php require 'event-global-catalog.php'; ?>

        </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/footer.php'; ?>
</body>

</html>