<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/auth.css">
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp"/>
    <title>Monogatarya - Iniciar sesión</title>
</head>

<body>
    <main class="container" aria-labelledby="login-title">
        <button class="btn-back" type="button" onclick="history.back()" aria-label="Volver a la página anterior">❮</button>

        <h1 id="login-title">Iniciar sesión</h1>
        <form action="../../controller/UserController.php" method="post">
            <label class="sr-only" for="login-email">Correo electrónico</label>
            <input id="login-email" name="email" class="btn-input input-email" type="email" placeholder="Email" required>

            <div class="error-box error-email">
                <span class="icon">ⓘ</span>
                <span>El correo electrónico no coincide. Introduce un correo electrónico válido.</span>
            </div>

            <label class="sr-only" for="login-password">Contraseña</label>
            <input id="login-password" class="btn-input input-password" type="password" name="password" placeholder="Contraseña" required
                minlength="6" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$"
                title="La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.">

            <div class="error-box error-password">
                <span class="icon">ⓘ</span>
                <span>La contraseña no coincide.</span>
            </div>

            <input class="btn btn-primary" type="submit" value="Iniciar sesión" name="login">
        </form>

        <p class="divider">O</p>

        <form action="register.html">
            <button class="btn btn-secondary" type="submit">Registrarse</button>
        </form>

        <label class="remember" for="remember-me">
            <input id="remember-me" type="checkbox">
            Recuérdame
        </label>
    </main>
</body>

</html>
