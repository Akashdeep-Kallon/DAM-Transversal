<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/styles/main.css" />
    <link rel="stylesheet" href="../../assets/styles/catalog.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Mangas</title>
</head>

<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/controller/CatalogController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/model/db.php';
    $catalog = new Catalog();
    $result = $catalog->returnCatalog('Manga');
    $query = $result['query'];
    $page = $result['page'];
    $totalPages = $result['totalPages'];
    ?>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/header.php'; ?>
    <main class="page-main">
        <div class="layout-container">

            <section class="card-panel" aria-labelledby="catalogo-title">
                <div class="section-header">
                    <h2 id="catalogo-title" class="section-title">Catálogo de Mangas</h2>
                    <a class="btn btn-add" href="../work-create.php">Añadir Manga</a>
                </div>
                <!-- Tarjetas de esta página -->
                <div class="card-grid card-grid-3">
                    <?php while ($manga = mysqli_fetch_assoc($query)) {
                        // Si la BD tiene columna de imagen úsala; si no, placeholder
                        $img = !empty($manga['Image']) ? htmlspecialchars($manga['Image']) : '/DAM-Transversal/view/assets/img/background-image.webp';
                        $title = htmlspecialchars($manga['Title']);
                        $subtitle = htmlspecialchars($manga['Subtitle']);
                        $id = $manga['ID_Work'];
                        ?>
                        <article class="content-card">
                            <img class="card-image" src="<?php echo $img; ?>" alt="Portada de <?php echo $title; ?>">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $subtitle; ?></p>
                            <a class="btn-link" href="manga-detail.php?id=<?php echo $id; ?>">
                                Más información
                            </a>
                        </article>
                    <?php } ?>
                </div>

                <?php require $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/pagination.php'; ?>

            </section>
        </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/footer.php'; ?>
</body>

</html>