<?php

class Database
{
    private $host = "sql7.freesqldatabase.com";
    private $usuario = "sql7820250";
    private $password = "Akashdick";
    private $base_datos = "sql7820250";

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
