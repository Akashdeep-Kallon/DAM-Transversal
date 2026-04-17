<?php
class Users
{
    private $email;
    private $status;
    private $name;
    private $surname;
    private $password;

    public function __construct($email, $status, $name, $surname, $password)
    {
        $this->email = $email;
        $this->status = $status ? 1 : 0;
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
    }
    public function register($password_confirm, $connection)
    {
        if (!isset($_SESSION['login_error']) || !is_array($_SESSION['login_error'])) {
            $_SESSION['login_error'] = [];
        }

        $connection->query("CALL sp_comprove_email('$this->email', @result)");
        $result = $connection->query("SELECT @result AS exist");
        $row = $result->fetch_assoc();
        $exist = intval($row["exist"]);

        if ($exist === 1) {
            $_SESSION['login_error'][] = "El correo ya está registrado.";
            return false;
        }

        if ($this->password !== $password_confirm) {
            $_SESSION['login_error'][] = "Las contraseñas no coinciden.";
            return false;
        }

        $connection->query("INSERT INTO Users (email, status, name, surname, password)
        VALUES ('$this->email', $this->status, '$this->name', '$this->surname', '$this->password')");

        return true;
    }

}
