<?php

class Database
{
/*
    ssh -i ssh-key-Monogatarya.key -L 3307:127.0.0.1:3306 ubuntu@130.110.233.182
    private $host = "127.0.0.1";
    private $port = 3307;
    private $user = "admin";
    private $password = "Monogatarya@2025";
    private $base_date = "Monogatarya";
*/

    private $host = "localhost";
    private $port = 3306;
    private $user = "admin";
    private $password = "Monogatarya@2025";
    private $base_date = "Monogatarya";

    public $connection;

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