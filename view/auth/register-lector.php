<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/DAM-Transversal/view/assets/styles/auth.css">
    <link rel="icon" type="image/png" href="/DAM-Transversal/view/assets/img/logo.webp" />
    <title>Monogatarya - Registro lector</title>
</head>

<body>
    <main class="auth-container" aria-labelledby="register-reader-title">
        <button class="btn-back" type="button" onclick="history.back()"
            aria-label="Volver a la página anterior">❮</button>

        <h1 id="register-reader-title">Registro de lector</h1>

        <form action="/DAM-Transversal/controller/UserController.php" method="post">
            
            <label class="sr-only" for="reader-name">Nombre</label>
            <input id="reader-name" class="btn-input input-name" type="text" name="name" placeholder="Nombre" required
                minlength="2" maxlength="30">

            <div class="error-box error-name">
                <span class="icon">ⓘ</span>
                <span>Introduce un nombre válido.</span>
            </div>

            <label class="sr-only" for="reader-lastname">Apellido</label>
            <input id="reader-lastname" class="btn-input input-lastname" type="text" name="lastname"
                placeholder="Apellido" required minlength="2" maxlength="30">

            <div class="error-box error-lastname">
                <span class="icon">ⓘ</span>
                <span>Introduce un apellido válido.</span>
            </div>

            <label class="sr-only" for="reader-email">Correo electrónico</label>
            <input id="reader-email" class="btn-input input-email" type="email" name="email" placeholder="Email"
                required>

            <div class="error-box error-email">
                <span class="icon">ⓘ</span>
                <span>Introduce un correo electrónico válido.</span>
            </div>

            <label class="sr-only" for="reader-password">Contraseña</label>
            <input id="reader-password" class="btn-input input-password" type="password" name="password"
                placeholder="Contraseña" required minlength="6" maxlength="20"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$"
                title="La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.">

            <div class="error-box error-password">
                <span class="icon">ⓘ</span>
                <span>La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.</span>
            </div>

            <label class="sr-only" for="reader-confirm">Confirmar contraseña</label>
            <input id="reader-confirm" class="btn-input" type="password" name="password_confirm"
                placeholder="Confirmar Contraseña" required minlength="6" maxlength="20"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$">

            <input class="btn btn-primary" type="submit" value="Registrarse" name="register_lector">
        </form>
    </main>

</body>

</html>