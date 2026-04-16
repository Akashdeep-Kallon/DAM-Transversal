<?php
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
        <a class="btn btn-add" href="../create-work.php">Añadir Evento</a>
    </div>

    <!-- Tarjetas de esta página -->
    <div class="card-grid card-grid-4">
        <?php while ($event = mysqli_fetch_assoc($query)) {
            $img = !empty($event['Image']) ? htmlspecialchars($event['Image']) : '/DAM-Transversal/view/assets/img/background-image.webp';
            $title = htmlspecialchars($event['Title']);
            $subtitle = htmlspecialchars($event['Subtitle']);
            $id = $event['ID_Event'];
            $active = !empty($event['Active']);   // columna booleana / tinyint
            ?>
            <article class="content-card event-card">
                <img class="card-image" src="<?php echo $img; ?>" alt="Cartel <?php echo $title; ?>">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $subtitle; ?></p>

                <?php if ($active) { ?>
                    <a class="btn-link" href="event-detail.php?id=<?php echo $id; ?>">
                        Información detallada
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

    </div>

</section>