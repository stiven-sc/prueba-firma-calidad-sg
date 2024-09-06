<?php
// models/User.php
require 'config.php';

class User {
    private $id;

    public function login($username, $password) {
        $db = connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result['password'])) {
            $this->id = $result['id'];
            return true;
        }
        return false;
    }

    public function register($username, $password) {
        $db = connect();
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
    }

    public function getId() {
        return $this->id;
    }
}
?>
