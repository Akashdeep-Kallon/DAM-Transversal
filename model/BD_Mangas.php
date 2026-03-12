<?php
class BD_Mangas{
    private $ID_Mangas;
    private $Nombre;
    private $Num_Capitulos;
    private $Descripcion;
    private $Correo;

    public function __construct($ID_Mangas, $Nombre, $Num_Capitulos, $Descripcion, $Correo){
        $this->ID_Mangas = $ID_Mangas;
        $this->Nombre = $Nombre;
        $this->Num_Capitulos = $Num_Capitulos;
        $this->Descripcion = $Descripcion;
        $this->Correo = $Correo;
    }

    public function getID_Mangas(){
        return $this->ID_Mangas;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getNum_Capitulos(){
        return $this->Num_Capitulos;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getCorreo(){
        return $this->Correo;
    }

    public function setID_Mangas($ID_Mangas){
        $this->ID_Mangas = $ID_Mangas;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setNum_Capitulos($Num_Capitulos){
        $this->Num_Capitulos = $Num_Capitulos;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setCorreo($Correo){
        $this->Correo = $Correo;
    }
}
?>