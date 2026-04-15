<?php
session_start();
require_once __DIR__ . '/../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catalog = new Catalog();

    if (isset($_POST['createWork'])) {
        $catalog->createWork();
    }
}
class Catalog
{
    private $ID_Work;
    private $ID_User;

    public function returnCatalog($catalog)
    {
        $db = new Database();
        $connection = $db->getConnection();

        // ── 1. Cuántos animes hay en total 
        $queryTotal = mysqli_query($connection, "SELECT COUNT(*) AS total FROM Works WHERE Type = '$catalog'");
        $fila = mysqli_fetch_assoc($queryTotal);
        $totalMedia = $fila['total'];

        // ── 2. Cuántos mostramos por página 
        $limit = 6;

        // ── 3. Cuántas páginas necesitamos 
        $totalPages = ceil($totalMedia / $limit);

        // ── 4. En qué página estamos (viene de ?page=N en la URL) 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        // Seguridad: que la página no sea menor que 1 ni mayor que el total
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // ── 5. Calculamos desde qué registro empezamos 
        // Página 1 → offset 0  (empieza desde el primero)
        // Página 2 → offset 6  (empieza desde el séptimo)
        // Página 3 → offset 12 (empieza desde el treceavo) ...
        $offset = ($page - 1) * $limit;

        // ── 6. Consulta con LIMIT y OFFSET 
        
        $sql = "SELECT * FROM Works WHERE Type = '$catalog' LIMIT $limit OFFSET $offset";
        $query = mysqli_query($connection, $sql);

        return [
            'page' => $page,
            'totalPages' => $totalPages,
            'query' => $query
        ];
    }

    public function createWork() 
    {
        if (!empty($_POST['W_titulo']) && !empty($_POST['W_type'])) {
            $type = $_POST['W_type'];
            $anime = $_POST['W_titulo'];
            $subtitulo = $_POST['W_subtitulo'];
            $episodios = $_POST['W_episodios'];
            $duracion = $_POST['W_duracion'];
            $imagen = $_POST['W_imagen'];
            //$video = $_FILES['W_video']['name'];
            $fecha_estreno = $_POST['W_fecha_estreno'];
            $estudio = $_POST['W_estudio'];
            $generos = $_POST['W_generos'];
            $descripcion = $_POST['W_descripcion'];
           
            $db = new Database();
            $connection = $db->getConnection();
            $connection->query("CALL sp_add_Work(
                '$type',
                '$anime',
                '$subtitulo',
                $episodios,
                '$imagen',
                '$estudio',
                '$fecha_estreno',
                '$generos',
                '$descripcion',
                NULL
            )");

            $redirectType = strtolower($type);
            if (!in_array($redirectType, ['anime', 'manga'])) {
                $redirectType = 'anime';
            }

            header('Location: ../view/catalogs/' . $redirectType . '/' . $redirectType . '-catalog.php');
            exit();
        }
    }

}
?>