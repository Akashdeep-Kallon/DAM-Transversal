<?php

class Database
{
    private $host;
    private $port;
    private $user;
    private $password;
    private $base_date;

    public $connection;

    public function __construct()
    {
        // Detectar si estás en local o en servidor
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $this->host = "127.0.0.1";
            $this->port = 3307;
        } else {
            $this->host = "localhost";
            $this->port = 3306;
        }

        $this->user = "admin";
        $this->password = "Monogatarya@2025";
        $this->base_date = "Monogatarya";
    }

    public function getConnection()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->base_date,
            $this->port
        );

        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }

        $this->connection->set_charset("utf8mb4");
        return $this->connection;
    }
}