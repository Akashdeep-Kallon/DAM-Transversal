# DAM Transversal Backend

## Introducción
Este proyecto implementa el registro, login/logout y gestión de usuarios con una estructura MVC en PHP. Se utiliza MySQLi orientado a objetos para acceder a la base de datos y se maneja la autenticación basada en sesión.

## Funcionalidades
- Login para los distintos tipos de usuario desde un único formulario.
- Registro de nuevos usuarios con validación en servidor.
- Logout con cierre de sesión y redirección a login.
- Acceso restringido a páginas privadas según estado de sesión.
- Diferenciación de vistas y acciones para usuarios admin y estándar.
- Estructura de carpetas MVC: `model/`, `view/`, `controller/`.

## Cómo funciona

### Diagrama de Clases
```mermaid
classDiagram
    class UserController {
        +login($data)
        +logout()
        +register($data)
        +validateLogin($data)
        +validateRegister($data)
    }

    class Users {
        +__construct($db)
        +findByEmail($email)
        +create($data)
        +verifyPassword($password)
    }

    class db {
        +connect()
        +query($sql)
        +prepare($sql)
    }

    class View {
        +render($template, $data)
    }

    UserController --> Users : uses
    UserController --> View : renders
    UserController --> db : queries
    Users --> db : uses
```

### Diagrama de Secuencia: Login
```mermaid
sequenceDiagram
    participant Usuario
    participant LoginView
    participant UserController
    participant Users
    participant DB

    Usuario->>LoginView: Envia email y contraseña
    LoginView->>UserController: enviarDatosLogin()
    UserController->>Users: findByEmail(email)
    Users->>DB: prepararConsulta(email)
    DB-->>Users: filaUsuario
    Users-->>UserController: usuario
    UserController->>Users: verifyPassword(password)
    Users-->>UserController: passwordValido
    alt passwordValido
        UserController->>Usuario: iniciarSesion()
        UserController->>LoginView: redirigirPerfil()
    else
        UserController->>LoginView: mostrarError("Credenciales inválidas")
    end
```

### Diagrama de Secuencia: Registro
```mermaid
sequenceDiagram
    participant Usuario
    participant RegisterView
    participant UserController
    participant Users
    participant DB

    Usuario->>RegisterView: Envia formulario de registro
    RegisterView->>UserController: enviarDatosRegistro()
    UserController->>UserController: validateRegister(data)
    alt datosValidos
        UserController->>Users: create(data)
        Users->>DB: insertarUsuario(data)
        DB-->>Users: resultadoInsercion
        Users-->>UserController: usuarioCreado
        UserController->>RegisterView: redirigirPrincipal()
    else
        UserController->>RegisterView: mostrarErrores(validaciones)
    end
```

## Uso general
1. Configurar la conexión MySQL en `config.php`.
2. Importar la base de datos desde `model/Monogatarya_BD.sql`.
3. Abrir `index.php` y acceder al formulario de login.
4. Registrar nuevos usuarios desde las vistas de registro.
5. Usar el botón de logout para cerrar la sesión.

## Notas
- `UserController` contiene las funciones `login`, `logout` y `register`.
- La validación de entrada se realiza en el controlador antes de consultar la base de datos.
- Se evita el acceso a rutas privadas cuando el usuario no está autenticado.
