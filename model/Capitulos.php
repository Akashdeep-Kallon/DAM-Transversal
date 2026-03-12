<?php
class Capitulos{
    private $ID_Capitulos;
    private $NombreAnime;
    private $Titulo;
    private $NumCapitulo;
    private $ID_Mangas;

    public function __construct($ID_Capitulos, $NombreAnime, $Titulo, $NumCapitulo, $ID_Mangas){
        $this->ID_Capitulos = $ID_Capitulos;
        $this->NombreAnime = $NombreAnime;
        $this->Titulo = $Titulo;
        $this->NumCapitulo = $NumCapitulo;
        $this->ID_Mangas = $ID_Mangas;
    }

    public function getID_Capitulos(){
        return $this->ID_Capitulos;
    }

    public function getNombreAnime(){
        return $this->NombreAnime;
    }

    public function getTitulo(){
        return $this->Titulo;
    }

    public function getNumCapitulo(){
        return $this->NumCapitulo;
    }

    public function getID_Mangas(){
        return $this->ID_Mangas;
    }

    public function setID_Capitulos($ID_Capitulos){
        $this->ID_Capitulos = $ID_Capitulos;
    }

    public function setNombreAnime($NombreAnime){
        $this->NombreAnime = $NombreAnime;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setNumCapitulo($NumCapitulo){
        $this->NumCapitulo = $NumCapitulo;
    }

    public function setID_Manga($ID_Mangas){
        $this->ID_Mangas = $ID_Mangas;
    }
}
?>