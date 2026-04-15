<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
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

            $user = new Users($email, $status, $name, $surname, $password);

            $db = new Database();
            $connection = $db->getConnection();

            $user->register($password_confirm, $connection);
        } else {
            // $error = "Por favor, completa todos los campos.";
            // header("Location: register-lector.php?error=" . urlencode($error));
            //    exit;
        }
        exit();
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

                header('Location: ../view/profile/profile.php');
                exit();
            } else {
                // $error = "Correo electrónico o contraseña incorrectos. Inténtalo de nuevo.";
                // header("Location: index.php?error=" . urlencode($error));
                // exit();
            }
        } else {
            // $error = "Por favor, completa todos los campos.";
            // header("Location: register-lector.php?error=" . urlencode($error));
            //    exit;
        }
        exit();
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /DAM-Transversal/view/auth/login.php");
        exit;
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

    public function update() {}
    // delete an employee
    public function delete() {}
}
