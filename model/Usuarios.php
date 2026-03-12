<?php
class Usuarios
{
    private $Correo;
    private $Rango;
    private $Nombre;
    private $Apellido;
    private $Contrasena;


    public function __construct($Correo, $Rango, $Nombre, $Apellido, $Contrasena)
    {
        $this->Correo = $Correo;
        $this->Rango = $Rango;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Contrasena = $Contrasena;
    }

    public function getRango()
    {
        return $this->Rango;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    public function getContrasena()
    {
        return $this->Contrasena;
    }

    public function getCorreo()
    {
        return $this->Correo;
    }

    public function setRango($Rango)
    {
        $this->Rango = $Rango;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }

    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;
    }

    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }
}
