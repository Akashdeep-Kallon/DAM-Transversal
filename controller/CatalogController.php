<?php
session_start();
require_once '../model/db.php';
class Catalog
{
    private $ID;
    private $ID_User;

    public function returnCatalog($catalog)
    {
        $db = new Database();
        $conexion = $db->getConexion();

        // ── 1. Cuántos animes hay en total 
        $queryTotal = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM $catalog");
        $fila = mysqli_fetch_assoc($queryTotal);
        $totalMedia = $fila['total'];

        // ── 2. Cuántos mostramos por página 
        $limite = 6;

        // ── 3. Cuántas páginas necesitamos 
        $totalPages = ceil($totalMedia / $limite);

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
        $offset = ($page - 1) * $limite;

        // ── 6. Consulta con LIMIT y OFFSET 
        $sql = "SELECT * FROM $catalog LIMIT $limite OFFSET $offset";
        $query = mysqli_query($conexion, $sql);

        return [
            'page' => $page,
            'totalPages' => $totalPages,
            'query' => $query
        ];
    }
}
?>