<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/auth.css">
    <title>Monogatarya - Registro promotor</title>
</head>

<body>
    <main class="container" aria-labelledby="register-promoter-title">
        <button class="btn-back" type="button" onclick="history.back()" aria-label="Volver a la página anterior">❮</button>

        <h1 id="register-promoter-title">Registro de promotor</h1>

        <form action="../../controller/UserController.php" method="post">

            <label class="sr-only" for="promoter-name">Nombre</label>
            <input id="promoter-name" name="name" class="btn-input input-name" type="text" placeholder="Nombre"
                required minlength="2" maxlength="30">

            <div class="error-box error-name">
                <span class="icon">ⓘ</span>
                <span>Introduce un nombre válido.</span>
            </div>

            <label class="sr-only" for="promoter-lastname">Apellido</label>
            <input id="promoter-lastname" name="lastname" class="btn-input input-lastname" type="text" placeholder="Apellido"
                required minlength="2" maxlength="30">

            <div class="error-box error-lastname">
                <span class="icon">ⓘ</span>
                <span>Introduce un apellido válido.</span>
            </div>

            <label class="sr-only" for="promoter-email">Correo electrónico</label>
            <input id="promoter-email" name="email" class="btn-input input-email" type="email" placeholder="Email" required>

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

            <div class="error-box error-password">
                <span class="icon">ⓘ</span>
                <span>La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.</span>
            </div>

            <input class="btn btn-primary" type="submit" value="Crear cuenta de promotor" name="register_promotor">
        </form>
    </main>
</body>

</html>