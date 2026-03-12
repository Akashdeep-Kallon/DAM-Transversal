<?php
class Eventos{
    private $ID_Evento;
    private $Nombre;
    private $Descripcion;
    private $Fecha;
    private $Lugar;

    public function __construct($ID_Evento, $Nombre, $Descripcion, $Fecha, $Lugar){
        $this->ID_Evento = $ID_Evento;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Fecha = $Fecha;
        $this->Lugar = $Lugar;
    }

    public function getID_Evento(){
        return $this->ID_Evento;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getFecha(){
        return $this->Fecha;
    }

    public function getLugar(){
        return $this->Lugar;
    }

    public function setID_Evento($ID_Evento){
        $this->ID_Evento = $ID_Evento;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setFecha($Fecha){
        $this->Fecha = $Fecha;
    }

    public function setLugar($Lugar){
        $this->Lugar = $Lugar;
    }
}
?>