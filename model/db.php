<?php

class Database
{
    private $host = "sql7.freesqldatabase.com";
    private $usuario = "sql7822562";
    private $password = "BEu3RFH9hk";
    private $base_datos = "sql7822562";

    public $connection;

    public function getConnection()
    {
        $this->connection = new mysqli($this->host, $this->usuario, $this->password, $this->base_datos);

        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }

        $this->connection->set_charset("utf8mb4");
        return $this->connection;
    }
    
}
