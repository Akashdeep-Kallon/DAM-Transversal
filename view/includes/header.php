<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/config.php';
?>

<header>
    <div class="header-group">
        <label for="menu-toggle" class="icon-btn white" aria-label="Menú">
            <svg class="icon">
                <use href="/DAM-Transversal/view/assets/img/icon-sprites.svg#menu"></use>
            </svg>
        </label>

        <a href="/DAM-Transversal/view/index.php" class="logo-link" aria-label="Volver a inicio">
            <img src="/DAM-Transversal/view/assets/img/logo.webp" alt="Logo de la página Monogatarya">
        </a>

        <h1>MONOGATARYA</h1>

        <div class="right-group">
            <form action="" autocomplete="on" method="get">
                <div class="search">
                    <button class="icon-btn red" aria-label="Buscar">
                        <svg class="icon">
                            <use href="/DAM-Transversal/view/assets/img/icon-sprites.svg#buscar"></use>
                        </svg>
                    </button>

                    <input class="search-input" type="search" name="search" placeholder="Buscar"
                        required minlength="2" maxlength="40">

                    <button class="icon-btn red" aria-label="Micrófono">
                        <svg class="icon">
                            <use href="/DAM-Transversal/view/assets/img/icon-sprites.svg#microfono"></use>
                        </svg>
                    </button>
                </div>
            </form>

            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="/DAM-Transversal/view/profiles/profile.php" class="icon-btn white user-link" aria-label="Ir al perfil de promotor">
                    <svg class="icon">
                        <use href="/DAM-Transversal/view/assets/img/icon-sprites.svg#usuario"></use>
                    </svg>
                </a>
            <?php else: ?>
                <a href="/DAM-Transversal/view/auth/login.php" class="icon-btn white user-link" aria-label="Iniciar sesión">
                    <svg class="icon">
                        <use href="/DAM-Transversal/view/assets/img/icon-sprites.svg#usuario"></use>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>