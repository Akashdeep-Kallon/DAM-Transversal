<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/home.css" />
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Inicio</title>
</head>

<body>

    <?php require 'partials/header.php'; ?>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <h2 id="hero-title">El mayor catálogo de manga y anime del mundo</h2>
            <p>Explora estrenos, eventos y perfiles de la comunidad en cualquier dispositivo.</p>
        </section>

        <div class="home-actions">
            <a href="index.php" class="btn-ver-pagina">Ver la página</a>
        </div>

        <footer>© 2026 Monogatarya. Todos los derechos reservados.</footer>
    </main>

</body>

</html>