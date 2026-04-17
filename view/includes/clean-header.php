<?php
require_once __DIR__ . '/../../core/config.php';
?>

<header>
    <div class="header-group">
        <label for="menu-toggle" class="icon-btn white" aria-label="Menú">
            <svg class="icon">
                <use href="<?php echo ASSETS_URL; ?>/img/icon-sprites.svg#menu"></use>
            </svg>
        </label>
        <a href="<?php echo VIEW_URL; ?>/index.php" class="logo-link" aria-label="Volver a inicio">
            <img src="<?php echo ASSETS_URL; ?>/img/logo.webp" alt="Logo de la página Monogatarya">
        </a>
        <h1>MONOGATARYA</h1>
        <div class="right-group">
            <a href="<?php echo VIEW_URL; ?>/profile.php" class="icon-btn white user-link" aria-label="Ir al perfil">
                <svg class="icon">
                    <use href="<?php echo ASSETS_URL; ?>/img/icon-sprites.svg#usuario"></use>
                </svg>
            </a>
        </div>
    </div>
</header>