<!-- Botones de paginación -->
<div class="paginacion">
    <?php
    $rango = 2;
    $inicio = max(1, $page - $rango);
    $fin = min($totalPages, $page + $rango);
    ?>

    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo $page - 1; ?>">&laquo;</a>
    <?php } ?>

    <?php if ($inicio > 1) { ?>
        <span>...</span>
    <?php } ?>

    <?php for ($i = $inicio; $i <= $fin; $i++) { ?>
        <a href="?page=<?php echo $i; ?>" <?php echo $i === $page ? 'class="paginacion-active"' : ''; ?>>
            <?php echo $i; ?>
        </a>
    <?php } ?>

    <?php if ($fin < $totalPages) { ?>
        <span>...</span>
    <?php } ?>

    <?php if ($page < $totalPages) { ?>
        <a href="?page=<?php echo $page + 1; ?>">&raquo;</a>
    <?php } ?>
</div>