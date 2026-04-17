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
            <form action="" autocomplete="on" method="get">
                <div class="search">
                    <button class="icon-btn red" aria-label="Buscar">
                        <svg class="icon">
                            <use href="<?php echo ASSETS_URL; ?>/img/icon-sprites.svg#buscar"></use>
                        </svg>
                    </button>

                    <input class="search-input" type="search" name="search" placeholder="Buscar" required minlength="2"
                        maxlength="40">

                    <button class="icon-btn red" aria-label="Micrófono">
                        <svg class="icon">
                            <use href="<?php echo ASSETS_URL; ?>/img/icon-sprites.svg#microfono"></use>
                        </svg>
                    </button>
                </div>
            </form>
            <a href="<?php echo VIEW_URL; ?>/profile.php" class="icon-btn white user-link"
                aria-label="Ir al perfil de promotor">
                <svg class="icon">
                    <use href="<?php echo ASSETS_URL; ?>/img/icon-sprites.svg#usuario"></use>
                </svg>
            </a>
        </div>
    </div>
</header>