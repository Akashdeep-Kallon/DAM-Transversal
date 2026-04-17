<?php
require_once __DIR__ . '/../../core/config.php';
require_once __DIR__ . '/../../core/auth.php';
requireLogin();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/main.css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/styles/user.css" />
    <link rel="icon" type="image/png" href="<?php echo ASSETS_URL; ?>/img/logo.webp" />
    <title>Monogatarya - Perfil de Usuario</title>
</head>

<body>

    <?php include __DIR__ . '/includes/clean-header.php'; ?>

    <main class="page-main">
        <div class="layout-container">
            <section class="card-panel profile-panel" aria-labelledby="perfil-titulo">
                <?php echo "<h2 id=\"perfil-titulo\" class=\"section-title\">Perfil " . htmlspecialchars(ucfirst($_SESSION['status'])) . "</h2>"; ?>
                <form class="profile-layout" action="<?php echo CONTROLLER_URL; ?>/UserController.php" method="post">
                    <!-- COLUMNA IZQUIERDA -->
                    <aside class="avatar-box">
                        <img src="<?php echo ASSETS_URL; ?>/img/logo.webp" alt="Avatar del usuario">

                        <?php if (isPromoter()) { ?>
                            <label for="foto-user" class="file-label">Cambiar foto</label>
                            <input id="foto-user" type="file" accept="image/*">
                        <?php } ?>
                    </aside>

                    <!-- COLUMNA DERECHA -->
                    <section class="profile-form">

                        <div class="field">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" required minlength="2"
                                value="<?php echo htmlspecialchars($_SESSION['name']); ?>">
                        </div>

                        <div class="field">
                            <label for="apellido">Apellidos</label>
                            <input id="apellido" name="apellido" required minlength="2"
                                value="<?php echo htmlspecialchars($_SESSION['surname']); ?>">
                        </div>

                        <div class="field">
                            <label for="usuario">Correo electrónico</label>
                            <input id="usuario" name="usuario" required minlength="4"
                                value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
                        </div>

                        <div class="field">
                            <label for="password">Contraseña</label>
                            <input id="password" name="password" type="password" required minlength="6" maxlength="20"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$"
                                title="La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.">
                        </div>

                        <div class="field full">
                            <label for="bio">Biografía</label>
                            <textarea id="bio" name="bio"></textarea>
                        </div>

                        <div class="profile-actions">
                            <button type="submit" class="btn btn-delete">Guardar cambios</button>
                            <button type="reset" class="btn btn-delete">Borrar cuenta</button>
                            <button type="reset" class="btn btn-add">Reiniciar</button>
                        </div>

                    </section>
                </form>
            </section>
        </div>
    </main>
    <?php include __DIR__ . '/includes/menu.php'; ?>
    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>

</html>