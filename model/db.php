<?php

class Database
{
    private $host = "sql7.freesqldatabase.com";
    private $usuario = "sql7822562";
    private $password = "BEu3RFH9hk";
    private $base_datos = "sql7822562";

    public $conexion;

    public function getConexion()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->base_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        $this->conexion->set_charset("utf8mb4");
        return $this->conexion;
    }
}
