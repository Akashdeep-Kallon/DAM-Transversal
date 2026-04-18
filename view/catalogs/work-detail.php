<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/controller/CatalogController.php';

$type = $_GET['type'];
$id = $_GET['id'];

$result = (new Catalog())->returnWorkDetail($type, $id);

$title = $result['title'];
$image = $result['image'];
$trailer = $result['trailer'];
$description = $result['description'];
$premiere = $result['premiere'];
$studio = $result['studio'];
$gender = $result['gender'];
$chapters = $result['chapters'];

$redirectType = strtolower($type);
if (!in_array($redirectType, ['anime', 'manga'])) {
    $redirectType = 'anime';
}

$linkMedia = ($redirectType === 'manga') ? 'MANGA_URL' : 'ANIME_URL';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/main.css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/catalog.css" />
    <link rel="icon" type="image/png" href="<?php echo ASSETS_URL; ?>/img/logo.webp" />
    <title>Monogatarya - Lista de capitulos</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <article class="card-panel event-work" aria-labelledby="work-title">

                <section>
                    <h2 id="work-title" class="section-title">
                        <?php echo htmlspecialchars($title); ?>
                    </h2>

                    <!-- Trailer -->
                    <?php if (!empty($trailer)) { ?>
                        <p id="trailer-desc" class="field-help">Tráiler oficial de <?php echo htmlspecialchars($title); ?>
                        </p>
                        <video controls preload="metadata" aria-describedby="trailer-desc"
                            aria-label="Tráiler oficial de <?php echo htmlspecialchars($title); ?>">
                            <source src="<?php echo $linkMedia . $trailer; ?>" type="video/mp4">
                            Tu navegador no soporta vídeo HTML5.
                        </video>
                    <?php } ?>
                    <h3>Descripción</h3>
                    <p><?php echo htmlspecialchars($description); ?></p>

                    <!-- Lista de capítulos -->
                    <?php if (!empty($chapters)) { ?>
                        <h3>Capítulos</h3>
                        <ul class="chapter-list">
                            <?php foreach ($chapters as $chapter) { ?>
                                <li>
                                    <a
                                        href="<?php echo $redirectType; ?>/<?php echo $redirectType; ?>-read.php?type=<?php echo urlencode($type); ?>&id=<?php echo urlencode($id); ?>&idChapter=<?php echo urlencode($chapter['id']); ?>">
                                        <?php echo htmlspecialchars($chapter['title'] ?? 'Capítulo ' . $chapter['id']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </section>

                <div class="stack-actions">
                    <?php if (!empty($chapters)) {
                        $first = $chapters[0]; ?>
                        <a href="<?php echo $redirectType; ?>/<?php echo $redirectType; ?>-read.php?type=<?php echo urlencode($type); ?>&id=<?php echo urlencode($id); ?>&idChapter=<?php echo urlencode($first['id']); ?>"
                            class="btn btn-add">
                            Ver capítulo
                        </a>
                    <?php } ?>

                    <?php if (isPromoter()) { ?>
                        <a href="<?php echo $redirectType; ?>-edit.php?type=<?php echo urlencode($type); ?>&id=<?php echo urlencode($id); ?>"
                            class="btn btn-add">
                            Editar obra
                        </a>
                    <?php } ?>
                </div>

            </article>
        </div>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/footer.php'; ?>
</body>

</html>