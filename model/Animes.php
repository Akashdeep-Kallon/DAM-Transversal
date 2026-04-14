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

    public function getID_Anime()
    {
        return $this->ID_Anime;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getEpisodeCount()
    {
        return $this->EpisodeCount;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function getID_User()
    {
        return $this->ID_User;
    }

    public function setID_Anime($ID_Anime)
    {
        $this->ID_Anime = $ID_Anime;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function setEpisodeCount($EpisodeCount)
    {
        $this->EpisodeCount = $EpisodeCount;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    public function setID_User($ID_User)
    {
        $this->ID_User = $ID_User;
    }

    public function setEventsAnime()
    {
        $db = new Database();
        $conexion = $db->getConexion();
        $sql = "SELECT * FROM Animes";
        $query = mysqli_query($conexion, $sql) or die ("Pagination querry failed.");

        if(mysqli_num_rows($query) > 0){

        
        }
    }
}
?>