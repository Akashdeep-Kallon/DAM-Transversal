<?php
class CrearVer{
    private $Correo;
    private $ID_Evento;

    public function __construct($Correo, $ID_Evento){
        $this->Correo = $Correo;
        $this->ID_Evento = $ID_Evento;
    }

    public function getCorreo(){
        return $this->Correo;
    }

    public function getID_Evento(){
        return $this->ID_Evento;
    }

    public function setCorreo($Correo){
        $this->Correo = $Correo;
    }

    public function setID_Evento($ID_Evento){
        $this->ID_Evento = $ID_Evento;
    }
}
?>