<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/core/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/model/User.php';

class UserController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function register($status)
    {
        $location = AUTH_URL . "/register-" . ($status ? 'promoter' : 'reader') . ".php";

        // Validar campos vacíos
        if (
            empty($_POST['name']) || empty($_POST['lastname']) ||
            empty($_POST['email']) || empty($_POST['password']) ||
            empty($_POST['password_confirm'])
        ) {
            $this->errorMessage("Por favor, completa todos los campos para poder registrarse.", $location);
        }

        // Recoger datos
        $name = $_POST['name'];
        $surname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        // VALIDACIONES
        if (strlen($name) < 2) {
            $this->errorMessage("Introduce un nombre válido (mínimo 2 caracteres).", $location);
        }

        if (strlen($surname) < 2) {
            $this->errorMessage("Introduce un apellido válido (mínimo 2 caracteres).", $location);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage("Introduce un correo electrónico válido.", $location);
        }

        if (strlen($password) < 6) {
            $this->errorMessage("La contraseña debe tener al menos 6 caracteres.", $location);
        }

        if ($password !== $password_confirm) {
            $this->errorMessage("Las contraseñas no coinciden.", $location);
        }

        $this->connection->query("CALL sp_comprove_email('$email', @result)");
        $result = $this->connection->query("SELECT @result AS exist");
        $exist = intval($result->fetch_assoc()["exist"]);

        if ($exist === 1) {
            $this->errorMessage("El correo electrónico ya está registrado.", $location);
        }

        if ($exist === 0) {
            $this->connection->query(
                "INSERT INTO Users (email, status, name, surname, password)
                 VALUES ('$email', $status, '$name', '$surname', '$password')"
            );

            session_unset();

            $user = new User($email, $status, $name, $surname, $password);
            $user->setSessionUser();

            header('Location: ' . VIEW_URL . '/profile.php');
            exit();
        }

        // Si no se registró
        header("Location: " . $location);
        exit();
    }

    public function login()
    {
        $location = AUTH_URL . "/login.php";

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $this->errorMessage("Por favor, completa todos los campos para poder iniciar sesión.", $location);
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userQuery = $this->connection->query(
            "SELECT * FROM Users WHERE email = '$email' AND password = '$password'"
        );

        if ($userRow = $userQuery->fetch_assoc()) {
            session_unset();

            $user = new User(
                $userRow['email'],
                $userRow['status'],
                $userRow['name'],
                $userRow['surname'],
                $userRow['password']
            );
            $user->setSessionUser();

            header('Location: ' . VIEW_URL . '/index.php');
            exit();
        } else {
            $this->errorMessage("El correo electrónico o contraseña incorrectos.", $location);
        }

        // Si no se logea
        header("Location: " . $location);
        exit();
    }

    public function logout()
    {
        session_unset();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
        header("Location: " . AUTH_URL . "/login.php");
        exit();
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function errorMessage($message, $location)
    {
        if (!isset($_SESSION['login_error']) || !is_array($_SESSION['login_error'])) {
            $_SESSION['login_error'] = [];
        }

        $_SESSION['login_error'][] = $message;
        header("Location: " . $location);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $connection = $database->getConnection();

    $userController = new UserController($connection);

    if (isset($_POST['register_lector'])) {
        $userController->register(false);
    }

    if (isset($_POST['register_promoter'])) {
        $userController->register(true);
    }

    if (isset($_POST['login'])) {
        $userController->login();
    }

    if (isset($_POST['logout'])) {
        $userController->logout();
    }

    if (isset($_POST['update'])) {
        $userController->update();
    }

    if (isset($_POST['delete'])) {
        $userController->delete();
    }
}
