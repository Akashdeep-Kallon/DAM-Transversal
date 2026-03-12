<?php
class Episodios{
    private $ID_Episodios;
    private $NombreAnime;
    private $Titulo;
    private $NumEpisodio;
    private $ID_Anime;

    public function __construct($ID_Episodios, $NombreAnime, $Titulo, $NumEpisodio, $ID_Anime){
        $this->ID_Episodios = $ID_Episodios;
        $this->NombreAnime = $NombreAnime;
        $this->Titulo = $Titulo;
        $this->NumEpisodio = $NumEpisodio;
        $this->ID_Anime = $ID_Anime;
    }

    public function getID_Episodios(){
        return $this->ID_Episodios;
    }

    public function getNombreAnime(){
        return $this->NombreAnime;
    }

    public function getTitulo(){
        return $this->Titulo;
    }

    public function getNumEpisodio(){
        return $this->NumEpisodio;
    }

    public function getID_Anime(){
        return $this->ID_Anime;
    }

    public function setID_Episodios($ID_Episodios){
        $this->ID_Episodios = $ID_Episodios;
    }

    public function setNombreAnime($NombreAnime){
        $this->NombreAnime = $NombreAnime;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setNumEpisodio($NumEpisodio){
        $this->NumEpisodio = $NumEpisodio;
    }

    public function setID_Anime($ID_Anime){
        $this->ID_Anime = $ID_Anime;
    }
}
?>