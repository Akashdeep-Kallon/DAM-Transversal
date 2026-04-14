<?php
session_start();
require_once '../model/db.php';
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
}
?>