<?php
class Animes
{
    private $ID_Anime;
    private $Name;
    private $EpisodeCount;
    private $Description;
    private $ID_User;

    public function __construct($ID_Anime, $Name, $EpisodeCount, $Description, $ID_User)
    {
        $this->ID_Anime = $ID_Anime;
        $this->Name = $Name;
        $this->EpisodeCount = $EpisodeCount;
        $this->Description = $Description;
        $this->ID_User = $ID_User;
    }

    public function setEventsAnime()
    {
        $db = new Database();
        $conexion = $db->getConexion();
        $sql = "SELECT * FROM Animes";
        $query = mysqli_query($conexion, $sql) or die("Pagination querry failed.");

        if (mysqli_num_rows($query) > 0) {
            $t_record = mysqli_num_rows($query);
            $limit = 3;
            $total_page = ceil($t_record / $limit);
            echo '<div class="paginacion">';
            for ($i = 1; $i <= $total_page; $i++) {
                echo '<a href="anime-catalog.php?page=' . $i . '">' . $i . '</a>';
            }
            echo '</div>';
        }
    }
}
?>