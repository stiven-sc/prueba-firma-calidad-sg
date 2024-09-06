<?php
// controllers/AuthController.php
require_once 'models/User.php';

class AuthController {
    public function login() {
        require 'views/login.php';
    }

    public function handleLogin() {
        $user = new User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($user->login($username, $password)) {
            session_start();
            $_SESSION['user_id'] = $user->getId();
            header('Location: /dashboard');
        } else {
            echo "Invalid credentials";
        }
    }

    public function register() {
        require 'views/register.php';
    }

    public function handleRegister() {
        $user = new User();
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->register($username, $password);
        header('Location: /login');
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}
?>
