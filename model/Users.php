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
        $connection->query("CALL sp_comprovar_email('$this->email', @result)");
        $result = $connection->query("SELECT @result AS exist");
        $row = $result->fetch_assoc();
        $exist = intval($row["exist"]);

        if ($exist === 1) {
            echo "<span>El correo electronico ya esta registrado. Intentalo con otro.</span>";
            return false;
        }

        if ($this->password !== $password_confirm) {
            echo "<span>Las contrasenas no coinciden. Intentalo de nuevo.</span>";
            return false;
        }

        if ($this->password === $password_confirm && $exist === 0) {
            $connection->query("INSERT INTO Users (email, status, name, surname, password)
                VALUES ('$this->email', $this->status, '$this->name', '$this->surname', '$this->password')");
            return true;
        }

        $result->close();
        $connection->close();
        return false;
    }
}
