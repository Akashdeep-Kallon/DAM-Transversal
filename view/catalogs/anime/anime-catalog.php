<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/styles/main.css" />
    <link rel="stylesheet" href="../../assets/styles/catalog.css" />
    <title>Monogatarya - Catálogo de Animes</title>
</head>

<body>
    <?php
    require_once '../../../controller/CatalogController.php';
    require_once '../../../model/db.php';
    $catalog = new Catalog();
    $result = $catalog->returnCatalog('Animes');
    $anime = $result['media'];
    $page = $result['page'];
    $totalPages = $result['totalPages'];
    require '../../includes/header.php';
    ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="catalogo-title">

                <div class="section-header">
                    <h2 id="catalogo-title" class="section-title">Catálogo de animes</h2>
                    <a class="btn btn-add" href="anime-crear.php">Crear Anime</a>
                </div>
                <!-- Tarjetas de esta página -->
                <div class="card-grid card-grid-3">
                    <?php while ($anime) {
                        // Si la BD tiene columna de imagen úsala; si no, placeholder
                        $img = !empty($anime['Image']) ? htmlspecialchars($anime['Image']) : '../../assets/img/background-image.webp';
                        $title = htmlspecialchars($anime['Title']);
                        $subtitle = htmlspecialchars($anime['Subtitle']);
                        $id = $anime['ID_Anime'];
                        ?>
                        <article class="content-card">
                            <img class="card-image" src="<?php echo $img; ?>" alt="Portada de <?php echo $title; ?>">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $subtitle; ?></p>
                            <a class="btn-link" href="anime-detail.php?id=<?php echo $id; ?>">
                                Más información
                            </a>
                        </article>
                    <?php } ?>
                </div>

                <!-- Botones de paginación -->
                <div class="paginacion">

                    <!-- Botón « anterior -->
                    <?php if ($page > 1) { ?>
                        <a href="?page=<?php echo $page - 1; ?>">&laquo;</a>
                    <?php } ?>

                    <!-- Número de cada página -->
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                        <?php if ($i == $page) { ?>
                            <a href="?page=<?php echo $i; ?>" class="paginacion-active"><?php echo $i; ?></a>
                        <?php } else { ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php } ?>
                    <?php } ?>

                    <!-- Botón » siguiente -->
                    <?php if ($page < $totalPages) { ?>
                        <a href="?page=<?php echo $page + 1; ?>">&raquo;</a>
                    <?php } ?>

                </div>

            </section>
        </div>
    </main>

    <?php require '../../includes/menu.php'; ?>
    <?php require '../../includes/footer.php'; ?>
</body>

</html>