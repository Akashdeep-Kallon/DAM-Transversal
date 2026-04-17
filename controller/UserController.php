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
        if (!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {
            $name = $_POST['name'];
            $surname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            
            // VALIDACIONES

            // Validar name
            if (strlen($name) < 2) {
                $_SESSION['login_error'][] = "Introduce un nombre válido. El nombre debe tener al menos entre 2 a 30 caracteres.";
                header("Location: /DAM-Transversal/view/auth/register-lector.php");
                exit();
            }

            // Validar surname
            if (strlen($surname) < 2) {
                $_SESSION['login_error'][] = "Introduce un apellido válido. El apellido debe tener al menos entre 2 a 30 caracteres.";
                header("Location: /DAM-Transversal/view/auth/register-lector.php");
                exit();
            }

            // Validar email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['login_error'][] = "El correo electrónico no coincide. Introduce un correo electrónico válido.";
                header("Location: /DAM-Transversal/view/auth/register-lector.php");
                exit();
            }

            // Validar contraseña (mínimo 6 caracteres)
            if (strlen($password) < 6) {
                $_SESSION['login_error'][] = "La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.";
                header("Location: /DAM-Transversal/view/auth/register-lector.php");
                exit();
            }

            // Confirmación de contraseña
            if ($password !== $password_confirm) {
                $_SESSION['login_error'][] = "Las contraseñas no coinciden.";
                header("Location: /DAM-Transversal/view/auth/register-lector.php");
                exit();
            }

            $user = new Users($email, $status, $name, $surname, $password);

            $db = new Database();
            $connection = $db->getConnection();

            $registered = $user->register($password_confirm, $connection, $status ? 'promotor' : 'lector');

            if ($registered) {
                $_SESSION['email'] = $email;
                $_SESSION['usuario'] = $email;
                $_SESSION['status'] = $status ? 1 : 0;

                header('Location: /DAM-Transversal/view/profile.php');
                exit();
            }
        } else {
            $_SESSION['login_error'][] = "Por favor, completa todos los campos.";
            header("Location: /DAM-Transversal/view/auth/register-" . ($status ? 'promotor' : 'lector') . ".php");
            exit();
        }
    }

    // read all employees
    public function login()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new Database();
            $connection = $db->getConnection();

            $connection->query("CALL sp_login('$email', '$password', @result)");
            $result = $connection->query("SELECT @result AS exist");
            $row = $result->fetch_assoc();
            $exist = intval($row["exist"]); // 1 o 0

            if ($exist === 1) {
                $_SESSION['email'] = $email;
                $_SESSION['usuario'] = $email;

                $userQuery = $connection->query("SELECT status FROM Users WHERE email = '$email'");
                if ($userRow = $userQuery->fetch_assoc()) {
                    $_SESSION['status'] = $userRow['status'];
                }

                header('Location: /DAM-Transversal/view/profile.php');
                exit();
            } else {
                $_SESSION['login_error'] = "Correo electrónico o contraseña incorrectos.";
                header("Location: /DAM-Transversal/view/auth/login.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Por favor, completa todos los campos.";
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
