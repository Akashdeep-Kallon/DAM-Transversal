<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/model/User.php';

class UploadController
{
    private $connection;
    private $animeLocation = ANIME_URL;
    private $eventLocation = EVENT_URL;
    private $mangaLocation = MANGA_URL;
    private $userLocation = 'USER_URL';

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function uploadAvatar($user, $avatar)
    {
        $errors = [];

        $type = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
        $userId = $user->getUserID();
        $destination = $this->userLocation . $userId . '/';
        $file_destination = $destination . 'avatar.' . $type;
        // 1. Error de subida → PRIMERO
        if ($avatar['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error al recibir el archivo.";
        }
        // 2. Validar que es imagen real
        $check = getimagesize($avatar['tmp_name']);
        if ($check === false) {
            $errors[] = "El archivo no es una imagen.";
        }
        // 3. Tamaño máximo 5MB
        if ($avatar['size'] > 5000000) {
            $errors[] = "La imagen es demasiado grande. Máximo 5MB.";
        }
        // 4. Extensiones permitidas
        if (!in_array($type, ['jpg', 'jpeg', 'png', 'webp'])) {
            $errors[] = "Solo se permiten archivos JPG, JPEG, PNG y WEBP.";
        }
        // Si hay errores → devolverlos
        if (!empty($errors)) {
            $errors[] = "La imagen no se ha subido.";
            return $errors;
        }
        error_log("DESTINATION: " . $destination);
        error_log("AVATAR ERROR: " . $avatar['error']);
        error_log("AVATAR SIZE: " . $avatar['size']);
        error_log("IS_DIR: " . (is_dir($destination) ? 'true' : 'false'));

        // Crear carpeta si no existe
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        // Mover archivo y guardar ruta en BD
        if (move_uploaded_file($avatar['tmp_name'], $file_destination)) {
            $rutaBD = $userId . '/avatar.' . $type;
            $user->updateAvatar($rutaBD, $this->connection);
            return "Imagen subida correctamente.";
        } else {
            return ["Hubo un error al mover el archivo."];
        }
    }
}