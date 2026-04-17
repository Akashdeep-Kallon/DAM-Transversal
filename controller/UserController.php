<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAM-Transversal/config.php';
require_once __DIR__ . '/../model/Users.php';
require_once __DIR__ . '/../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userController = new UserController();

    if (isset($_POST['register_lector'])) {
        $userController->register(false);
    }

    if (isset($_POST['register_promotor'])) {
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

class UserController
{
    public function register($status)
    {
        // Asegurar que login_error es un array
        if (!isset($_SESSION['login_error']) || !is_array($_SESSION['login_error'])) {
            $_SESSION['login_error'] = [];
        }

        // Validar campos vacíos
        if (empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
            $_SESSION['login_error'][] = "Por favor, completa todos los campos.";
            header("Location: /DAM-Transversal/view/auth/register-" . ($status ? 'promotor' : 'lector') . ".php");
            exit();
        }

        // Recoger datos
        $name = $_POST['name'];
        $surname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        // VALIDACIONES
        if (strlen($name) < 2) {
            $_SESSION['login_error'][] = "Introduce un nombre válido (mínimo 2 caracteres).";
            header("Location: /DAM-Transversal/view/auth/register-lector.php");
            exit();
        }

        if (strlen($surname) < 2) {
            $_SESSION['login_error'][] = "Introduce un apellido válido (mínimo 2 caracteres).";
            header("Location: /DAM-Transversal/view/auth/register-lector.php");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['login_error'][] = "Introduce un correo electrónico válido.";
            header("Location: /DAM-Transversal/view/auth/register-lector.php");
            exit();
        }

        if (strlen($password) < 6) {
            $_SESSION['login_error'][] = "La contraseña debe tener al menos 6 caracteres.";
            header("Location: /DAM-Transversal/view/auth/register-lector.php");
            exit();
        }

        // Crear usuario
        $user = new Users($email, $status, $name, $surname, $password);

        // Conexión BD
        $db = new Database();
        $connection = $db->getConnection();

        // Registrar
        $registered = $user->register($password_confirm, $connection);

        if ($registered) {
            $_SESSION['email'] = $email;
            $_SESSION['status'] = $status ? 1 : 0;

            header('Location: /DAM-Transversal/view/profile.php');
            exit();
        }

        // Si no se registró
        header("Location: /DAM-Transversal/view/auth/register-" . ($status ? 'promotor' : 'lector') . ".php");
        exit();
    }
    public function login()
    {
        // Asegurar que login_error es un array
        if (!isset($_SESSION['login_error']) || !is_array($_SESSION['login_error'])) {
            $_SESSION['login_error'] = [];
        }

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new Database();
            $connection = $db->getConnection();

            $connection->query("CALL sp_login('$email', '$password', @result)");
            $result = $connection->query("SELECT @result AS exist");
            $row = $result ? $result->fetch_assoc() : null;
            $exist = isset($row["exist"]) ? intval($row["exist"]) : 0;

            if ($exist === 1) {
                $_SESSION['email'] = $email;

                $userQuery = $connection->query("SELECT status FROM Users WHERE email = '$email'");
                if ($userRow = $userQuery->fetch_assoc()) {
                    $_SESSION['status'] = $userRow['status'];
                }

                header('Location: /DAM-Transversal/view/profile.php');
                exit();
            }

            // $exist === 0 o cualquier valor inesperado
            $_SESSION['login_error'][] = "Correo electrónico o contraseña incorrectos.";
            header("Location: /DAM-Transversal/view/auth/login.php");
            exit();
        } else {
            $_SESSION['login_error'][] = "Por favor, completa todos los campos.";
            header("Location: /DAM-Transversal/view/auth/login.php");
            exit();
        }
    }

    public function logout()
    {
        // Limpiar todas las variables de sesión
        session_unset();
        // Destruir la sesión
        session_destroy();
        // Limpiar la cookie de sesión
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
        // Redirigir al login
        header("Location: /DAM-Transversal/view/auth/login.php");
        header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
        exit();
    }

    public function getLoggedUserProfile()
    {
        if (empty($_SESSION['email'])) {
            return null;
        }

        $db = new Database();
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT name, surname, email, status FROM Users WHERE email = ?");
        $stmt->bind_param('s', $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc() ?: null;
    }

    public function getLoggedUserProfileData()
    {
        $data = [
            'name' => '',
            'surname' => '',
            'email' => '',
            'status' => 'invitado',
        ];

        $profile = $this->getLoggedUserProfile();
        if (empty($profile)) {
            return $data;
        }

        return [
            'name' => $profile['name'],
            'surname' => $profile['surname'],
            'email' => $profile['email'],
            'status' => $profile['status'] ? 'promotor' : 'lector',
        ];
    }

    public function update()
    {
    }
    // delete an employee
    public function delete()
    {
    }
}