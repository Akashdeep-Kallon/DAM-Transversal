<?php
session_start();
require_once '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catalog = new Catalog();

    if (isset($_POST['crearAnime'])) {
        $catalog->createAnime();
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

    public function createAnime() 
    {
        if (!empty($_POST['A_titulo'])) {
            $anime = $_POST['A_titulo'];
            $subtitulo = $_POST['A_subtitulo'];
            $episodios = $_POST['A_episodios'];
            $duracion = $_POST['A_duracion'];
            $imagen = $_POST['A_imagen'];
            //$video = $_FILES['A_video']['name'];
            $fecha_estreno = $_POST['A_fecha_estreno'];
            $estudio = $_POST['A_estudio'];
            $generos = $_POST['A_generos'];
            $descripcion = $_POST['A_descripcion'];
           
            $db = new Database();
            $connection = $db->getConnection();
            $connection->query("CALL sp_crearAnime(
                '$anime',
                '$subtitulo',
                $episodios,
                $duracion,
                '$imagen',
                '$fecha_estreno',
                '$estudio',
                '$generos',
                '$descripcion'
            )");
            header('Location: ../view/../view/catalogs/anime/anime-catalog.php');
                exit();
        }
    }

}
?>