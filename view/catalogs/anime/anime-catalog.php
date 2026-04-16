<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/styles/main.css" />
    <link rel="stylesheet" href="../../assets/styles/catalog.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Catálogo de Animes</title>
</head>

<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/controller/CatalogController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/model/db.php';
    $catalog = new Catalog();
    $result = $catalog->returnCatalog('Anime');
    $query = $result['query'];
    $page = $result['page'];
    $totalPages = $result['totalPages'];
    require '../../includes/header.php';
    ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="catalogo-title">

                <div class="section-header">
                    <h2 id="catalogo-title" class="section-title">Catálogo de animes</h2>
                    <a class="btn btn-add" href="../create_work.php">Crear Anime</a>
                </div>
                <!-- Tarjetas de esta página -->
                <div class="card-grid card-grid-3">
                    <?php while ($anime = mysqli_fetch_assoc($query)) {
                        // Si la BD tiene columna de imagen úsala; si no, placeholder
                        $img = !empty($anime['Image']) ? htmlspecialchars($anime['Image']) : '../../assets/img/background-image.webp';
                        $title = htmlspecialchars($anime['Title']);
                        $subtitle = htmlspecialchars($anime['Subtitle']);
                        $id = $anime['ID_Work'];
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

                <?php require __DIR__ . '/../includes/pagination.php'; ?>

            </section>
        </div>
    </main>

    <?php require '../../includes/menu.php'; ?>
    <?php require '../../includes/footer.php'; ?>
</body>

</html>