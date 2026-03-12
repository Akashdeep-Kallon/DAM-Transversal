<?php
class Animes{
    private $ID_Anime;
    private $Nombre;
    private $NumEpisodios;
    private $Descripcion;
    private $ID_User;

    public function __construct($ID_Anime, $Nombre, $NumEpisodios, $Descripcion, $ID_User){
        $this->ID_Anime = $ID_Anime;
        $this->Nombre = $Nombre;
        $this->NumEpisodios = $NumEpisodios;
        $this->Descripcion = $Descripcion;
        $this->ID_User = $ID_User;
    }

    public function getID_Anime(){
        return $this->ID_Anime;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getNumEpisodios(){
        return $this->NumEpisodios;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getID_User(){
        return $this->ID_User;
    }

    public function setID_Anime($ID_Anime){
        $this->ID_Anime = $ID_Anime;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setNumEpisodios($NumEpisodios){
        $this->NumEpisodios = $NumEpisodios;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setID_User($ID_User){
        $this->ID_User = $ID_User;
    }
}
?>