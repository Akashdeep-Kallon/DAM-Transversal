<?php
// ssh -i ssh-key-Monogatarya.key -L 3307:127.0.0.1:3306 ubuntu@130.110.233.182
class Database
{
    private $host;
    private $port;
    private $user;
    private $password;
    private $date_base;
    public $connection;

    public function __construct()
    {
        $host = $_SERVER['HTTP_HOST'] ?? '';

        if ($host === 'localhost' || $host === '127.0.0.1' || str_contains($host, 'localhost:')) {
            $this->host = "127.0.0.1";
            $this->port = 3307;
        } else {
            $this->host = "localhost";
            $this->port = 3306;
        }

        $this->user = "admin";
        $this->password = "Monogatarya@2025";
        $this->date_base = "Monogatarya";
    }

    public function getConnection()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->date_base,
            $this->port
        );

        if ($this->connection->connect_error) {
            die("Error de conexion: " . $this->connection->connect_error);
        }

        $this->connection->set_charset("utf8mb4");
        return $this->connection;
    }
}

?>