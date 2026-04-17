<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catalog = new Catalog();

    if (isset($_POST['create_work'])) {
        $catalog->createWork();
    }
    
    if (isset($_POST['create_event'])) {
        $catalog->createEvent();
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
        $totalPages = max(1, ceil($totalMedia / $limit));

        // ── 4. En qué página estamos (viene de ?page=N en la URL)
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

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

        $escapedCatalog = $connection->real_escape_string($catalog);
        $sql = "SELECT * FROM Works WHERE Type = '$escapedCatalog' LIMIT $limit OFFSET $offset";
        $query = mysqli_query($connection, $sql);

        return [
            'page' => $page,
            'totalPages' => $totalPages,
            'query' => $query
        ];
    }

    public function returnCatalogEvent()
    {
        $db = new Database();
        $connection = $db->getConnection();

        // ── 1. Cuántos animes hay en total
        $queryTotal = mysqli_query($connection, "SELECT COUNT(*) AS total FROM Events");
        $fila = mysqli_fetch_assoc($queryTotal);
        $totalMedia = $fila['total'];

        // ── 2. Cuántos mostramos por página
        $limit = 6;

        // ── 3. Cuántas páginas necesitamos
        $totalPages = max(1, ceil($totalMedia / $limit));

        // ── 4. En qué página estamos (viene de ?page=N en la URL)
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

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

        $sql = "SELECT * FROM Events LIMIT $limit OFFSET $offset";
        $query = mysqli_query($connection, $sql);

        return [
            'page' => $page,
            'totalPages' => $totalPages,
            'query' => $query
        ];
    }

    public function createWork()
    {
        if (!empty($_POST['title']) && !empty($_POST['type'])) {
            $type = $_POST['type'];
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $chapters = $_POST['chapters'];
            $image = $_POST['image'];
            //$video = $_FILES['video']['name'];
            $premiereDate = $_POST['premiere_date'];
            $studio = $_POST['studio'];
            $gender = $_POST['gender'];
            $description = $_POST['description'];

            $db = new Database();
            $connection = $db->getConnection();
            $connection->query("CALL sp_add_Work(
                '$type',
                '$title',
                '$subtitle',
                $chapters,
                '$image',
                '$studio',
                '$premiereDate',
                '$gender',
                '$description',
                NULL
            )");

            $redirectType = strtolower($type);
            if (!in_array($redirectType, ['anime', 'manga'])) {
                $redirectType = 'anime';
            }

            header('Location: ' . VIEW_URL . '/catalogs/' . $redirectType . '/' . $redirectType . '-catalog.php');
            exit();
        }
    }

    public function createEvent()
    {
        if (!empty($_POST['title'])) {

            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $date_event = $_POST['date_event'];
            $location = $_POST['location'];
            $capacity = $_POST['capacity'];

            $db = new Database();
            $connection = $db->getConnection();

            $connection->query("
            CALL sp_add_Event(
                '$title',
                '$subtitle',
                '$description',
                '$image',
                '$date_event',
                '$location',
                $capacity,
                NULL
            )
        ");

            header('Location: ' . VIEW_URL . '/catalogs/events/event-catalog.php');
            exit();
        }
    }
}
?>