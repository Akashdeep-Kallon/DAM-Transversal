<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/controller/CatalogController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/model/db.php';
$catalog = new Catalog();
$result = $catalog->returnCatalogEvent();
$query = $result['query'];
$page = $result['page'];
$totalPages = $result['totalPages'];
?>

<section class="card-panel" aria-labelledby="catalogo-title">

    <div class="section-header">
        <h2 id="catalogo-title" class="section-title">Catálogo de Eventos</h2>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1): ?>
            <a class="btn btn-add" href="/DAM-Transversal/view/catalogs/events/event-create.php">Añadir Evento</a>
        <?php endif; ?>
    </div>

    <!-- Tarjetas -->
    <div class="card-grid card-grid-3">
        <?php while ($event = mysqli_fetch_assoc($query)) {
            $img = !empty($event['Image']) ? htmlspecialchars($event['Image']) : '/DAM-Transversal/view/assets/img/background-image.webp';
            $title = htmlspecialchars($event['Title']);
            $subtitle = htmlspecialchars($event['Subtitle']);
            $id = $event['ID_Event'];
            $active = $event['Active'];
            ?>
            <article class="content-card">
                <img class="card-image" src="<?php echo $img; ?>" alt="Cartel <?php echo $title; ?>">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $subtitle; ?></p>

                <?php if ($active) { ?>
                    <a class="btn-link" href="event-detail.php?id=<?php echo $id; ?>">
                        Más información
                    </a>
                <?php } else { ?>
                    <button class="btn-link btn-muted" type="button" disabled>
                        Próximamente
                    </button>
                <?php } ?>
            </article>
        <?php } ?>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/pagination.php'; ?>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/view/includes/menu.php'; ?>
    </body>

    </html>