<?php require_once __DIR__ . '/../../../core/config.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/main.css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/catalog.css" />
    <link rel="icon" type="image/png" href="<?php echo ASSETS_URL; ?>/img/logo.webp" />
    <title>Monogatarya - Eventos</title>
</head>

<body>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <main class="page-main">
        <div class="layout-container">

            <?php require 'event-global-catalog.php'; ?>

        </div>
    </main>

    <?php include __DIR__ . '/../../includes/menu.php'; ?>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>

</html>