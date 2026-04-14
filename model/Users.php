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
        $exist = intval($row["exist"]); // 1 o 0

        if ($exist === 1) {
            echo "<span>El correo electrónico ya está registrado. Inténtalo con otro.</span>";
            return;
        }

        if ($this->password !== $password_confirm) {
            echo "<span>Las contraseñas no coinciden. Inténtalo de nuevo.</span>";
            return;
        }

        if ($this->password === $password_confirm && $exist === 0) {
            $connection->query("INSERT INTO Users (email, promotor, name, surname, password)
                VALUES ('$this->email', $this->status, '$this->name', '$this->surname', '$this->password')");
            header('Location: ../view/index.php');
            exit();
        }

        $result->close();
        $connection->close();
    }
}
