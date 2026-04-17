<!-- Botones de paginación -->
<div class="pagination">
    <?php
    $range = 2;
    $start = max(1, $page - $range);
    $end = min($totalPages, $page + $range);
    ?>

    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo $page - 1; ?>">&laquo;</a>
    <?php } else { ?>
        <span class="pagination-disabled">&laquo;</span>
    <?php } ?>

    <?php if ($start > 1) { ?>
        <span class="pagination-ellipsis">...</span>
    <?php } ?>

    <?php for ($i = $start; $i <= $end; $i++) { ?>
        <a href="?page=<?php echo $i; ?>" <?php echo $i === $page ? 'class="pagination-active"' : ''; ?>>
            <?php echo $i; ?>
        </a>
    <?php } ?>

    <?php if ($end < $totalPages) { ?>
        <span class="pagination-ellipsis">...</span>
    <?php } ?>

    <?php if ($page < $totalPages) { ?>
        <a href="?page=<?php echo $page + 1; ?>">&raquo;</a>
    <?php } else { ?>
        <span class="pagination-disabled">&raquo;</span>
    <?php } ?>
</div>
