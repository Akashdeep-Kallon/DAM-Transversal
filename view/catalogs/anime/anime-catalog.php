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
    <?php require '../../includes/header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel" aria-labelledby="catalogo-title">

                <div class="section-header">
                    <h2 id="catalogo-title" class="section-title">Catálogo de animes</h2>
                    <a class="btn btn-add" href="anime-crear.php">Crear Anime</a>
                </div>

                <?php
                require_once '../../../model/db.php';

                $db = new Database();
                $conexion = $db->getConexion();

                // ── 1. Cuántos animes hay en total 
                $queryTotal = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM Animes");
                $fila = mysqli_fetch_assoc($queryTotal);
                $totalAnimes = $fila['total'];

                // ── 2. Cuántos mostramos por página 
                $limite = 6;

                // ── 3. Cuántas páginas necesitamos 
                $totalPaginas = ceil($totalAnimes / $limite);

                // ── 4. En qué página estamos (viene de ?page=N en la URL) 
                if (isset($_GET['page'])) {
                    $pagina = $_GET['page'];
                } else {
                    $pagina = 1;
                }

                // Seguridad: que la página no sea menor que 1 ni mayor que el total
                if ($pagina < 1) {
                    $pagina = 1;
                }
                if ($pagina > $totalPaginas) {
                    $pagina = $totalPaginas;
                }

                // ── 5. Calculamos desde qué registro empezamos 
                // Página 1 → offset 0  (empieza desde el primero)
                // Página 2 → offset 6  (empieza desde el séptimo)
                // Página 3 → offset 12 (empieza desde el treceavo) ...
                $offset = ($pagina - 1) * $limite;

                // ── 6. Consulta con LIMIT y OFFSET 
                $sql = "SELECT * FROM Animes LIMIT $limite OFFSET $offset";
                $query = mysqli_query($conexion, $sql);
                ?>

                <!-- Tarjetas de esta página -->
                <div class="card-grid card-grid-3">
                    <?php while ($anime = mysqli_fetch_assoc($query)) { ?>
                        <?php
                        // Si la BD tiene columna de imagen úsala; si no, placeholder
                        $img = !empty($anime['Image']) ? htmlspecialchars($anime['Image']) : '../../assets/img/background-image.webp';
                        $title = htmlspecialchars($anime['Title']);
                        $subtitle = htmlspecialchars($anime['Subtitle']);
                        $id = $anime['IDAnimes'];
                        ?>
                        <article class="content-card">
                            <img class="card-image" src="<?php echo $img; ?>"
                                alt="Portada de <?php echo $title; ?>">
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
                    <?php if ($pagina > 1) { ?>
                        <a href="?page=<?php echo $pagina - 1; ?>">&laquo;</a>
                    <?php } ?>

                    <!-- Número de cada página -->
                    <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                        <?php if ($i == $pagina) { ?>
                            <a href="?page=<?php echo $i; ?>" class="paginacion-active"><?php echo $i; ?></a>
                        <?php } else { ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php } ?>
                    <?php } ?>

                    <!-- Botón » siguiente -->
                    <?php if ($pagina < $totalPaginas) { ?>
                        <a href="?page=<?php echo $pagina + 1; ?>">&raquo;</a>
                    <?php } ?>

                </div>

            </section>
        </div>
    </main>

    <?php require '../../includes/menu.php'; ?>
    <?php require '../../includes/footer.php'; ?>
</body>

</html>