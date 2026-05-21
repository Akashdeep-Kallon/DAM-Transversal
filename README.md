# Práctica 6: CRUD

## Descripción

Este proyecto es una aplicación web desarrollada en PHP para gestionar un CRUD completo sobre usuarios, obras, capítulos y eventos. Utiliza PDO para la conexión con MySQL, y está organizado en controladores, modelos y vistas.

El sistema permite:
- Registrar y autenticar lectores y promotores.
- Crear, editar y eliminar obras de anime y manga.
- Añadir, actualizar y borrar capítulos.
- Crear, editar y eliminar eventos.
- Gestionar archivos multimedia asociados a las obras y eventos.

## ¿Qué es PDO y por qué se usa?

PDO (PHP Data Objects) es una extensión de PHP que permite conectarse a bases de datos de manera segura y uniforme. En este proyecto se usa PDO porque:
- ofrece consultas preparadas para prevenir inyecciones SQL.
- centraliza la conexión en una clase `Database`.
- maneja errores mediante excepciones (`PDO::ERRMODE_EXCEPTION`).
- devuelve resultados en formato asociativo fácil de manejar (`PDO::FETCH_ASSOC`).

## Tecnologías utilizadas

- PHP
- MySQL
- PDO
- HTML/CSS
- JavaScript

## Requisitos previos

- Servidor local como XAMPP.
- PHP con extensión PDO MySQL habilitada.
- MySQL / MariaDB.
- Proyecto ubicado en `htdocs/DAM-Transversal` o ruta equivalente.

## Configuración de la base de datos

La conexión se configura en `core/database.php`.

Valores de ejemplo encontrados en el proyecto:
- Host local: `127.0.0.1`
- Puerto local: `3307`
- Usuario: `admin`
- Contraseña: `Monogatarya@2025`
- Base de datos: `Monogatarya`
- Charset: `utf8mb4`

El comportamiento local está controlado en el constructor de `Database`: si `$_SERVER['HTTP_HOST']` es `localhost` o `127.0.0.1`, usa `127.0.0.1:3307`; de lo contrario, usa `localhost:3306`.

## Cómo importar el archivo .sql

El proyecto incluye:
- `model/Monogatarya_BD.sql` → definición de tablas y procedimientos.
- `model/CargarAnimesIni.sql` → datos de ejemplo.

Importar desde la terminal:

```bash
mysql -u admin -pMonogatarya@2025 < model/Monogatarya_BD.sql
mysql -u admin -pMonogatarya@2025 Monogatarya < model/CargarAnimesIni.sql
```

También puedes importar los archivos desde phpMyAdmin o MySQL Workbench.

## Configuración de la conexión PDO

El archivo `core/database.php` define la conexión PDO:

```php
$dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";
$this->connection = new PDO($dsn, $this->user, $this->password);
$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
```

Si tu instalación usa `localhost` sin puerto personalizado, ajusta `host` y `port` en ese archivo.

## Instalación y ejecución paso a paso

1. Copia `DAM-Transversal` a `htdocs` de tu servidor local.
2. Importa `model/Monogatarya_BD.sql` en MySQL.
3. (Opcional) importa `model/CargarAnimesIni.sql`.
4. Revisa y ajusta las credenciales en `core/database.php`.
5. Abre el navegador en: `http://localhost/DAM-Transversal/view/index.php`.
6. Accede a `http://localhost/DAM-Transversal/view/auth/login.php` para iniciar sesión.

## Operaciones CRUD

### Create

- `UserController::register()` inserta nuevos usuarios en `Users`.
- `Catalog::createWork()` crea obras en `Works`.
- `Catalog::addChapter()` añade capítulos en `Chapters`.
- `Catalog::createEvent()` crea eventos en `Events`.

### Read

- `Catalog::returnCatalog()` obtiene listados de obras y eventos.
- `Catalog::returnWorkDetail()` recupera detalles de una obra.
- `Catalog::returnChapter()` y `Catalog::getChapter()` leen capítulos.
- `Catalog::eventDetail()` obtiene datos de eventos.
- Las vistas usan `fetch()` y `fetchAll()` para mostrar resultados.

### Update

- `UserController::update()` modifica los datos del perfil.
- `Catalog::updateWork()` actualiza obras.
- `Catalog::updateChapter()` modifica capítulos.
- `Catalog::updateEvent()` edita eventos.
- `User::updateAvatar()` actualiza el avatar del usuario.

### Delete

- `UserController::delete()` elimina cuentas de usuario.
- `Catalog::deleteWork()` borra obras.
- `Catalog::deleteChapter()` borra capítulos.
- `Catalog::deleteEvent()` borra eventos.

## Estructura del proyecto

```
DAM-Transversal/
├── controller/
│   ├── CatalogController.php
│   ├── UploadController.php
│   └── UserController.php
├── core/
│   ├── auth.php
│   ├── config.php
│   └── database.php
├── model/
│   ├── CargarAnimesIni.sql
│   ├── Monogatarya_BD.sql
│   └── User.php
└── view/
    ├── auth/
    ├── catalogs/
    ├── includes/
    ├── profile.php
    └── index.php
```

## Ejemplos de consultas PDO utilizadas

```php
$stmt = $this->connection->prepare("CALL sp_comprove_email(:email, @result)");
$stmt->execute([':email' => $email]);

$stmt = $this->connection->prepare(
    "INSERT INTO Users (email, status, name, surname, password)
     VALUES (:email, :status, :name, :surname, :password)"
);
$stmt->execute([
    ':email' => $email,
    ':status' => $status ? 1 : 0,
    ':name' => $name,
    ':surname' => $surname,
    ':password' => $hashedPassword,
]);

$query = $this->connection->query("SELECT * FROM Works WHERE Type = $escapedCatalog LIMIT $limit OFFSET $offset");
$row = $query->fetch();
```

También se usan `quote()`, `lastInsertId()`, `fetchAll()` y `closeCursor()`.

## Ejemplos de uso

- Registro de usuario en `view/auth/register-reader.php` o `view/auth/register-promoter.php`.
- Inicio de sesión en `view/auth/login.php`.
- Creación de obras desde los formularios de catálogo.
- Edición de obras, capítulos y eventos.
- Eliminación de usuarios, obras, capítulos y eventos.

> Capturas de uso: puedes insertar aquí imágenes del flujo de la aplicación según tu entorno.

## Posibles mejoras

- Refactorizar consultas en repositorios/DAO independientes.
- Usar transacciones PDO para operaciones múltiples.
- Parametrizar todas las consultas en lugar de concatenar SQL.
- Añadir validación del lado cliente.
- Implementar pruebas unitarias y de integración.
- Añadir control de roles más estricto.

## Autor y fecha

- Autor: Práctica 6 — DAM Transversal
- Fecha: 2026-05-21
