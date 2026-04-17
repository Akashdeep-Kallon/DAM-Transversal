<?php
class User
{
    private $email;
    private $status;
    private $name;
    private $surname;
    private $password;

    public function __construct($email, $status, $name, $surname, $password)
    {
        $this->email = $email;
        $this->status = $status ? 'promoter' : 'reader';
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
    }


    public function setSessionUser()
    {
        $_SESSION['email'] = $this->email;
        $_SESSION['status'] = $this->status;
        $_SESSION['name'] = $this->name;
        $_SESSION['surname'] = $this->surname;
        $_SESSION['password'] = $this->password;
    }

    /*     public function getLoggedUserProfile()
        {
            $stmt = $this->connection->prepare("SELECT name, surname, email, status FROM Users WHERE email = ?");
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
        } */

}
