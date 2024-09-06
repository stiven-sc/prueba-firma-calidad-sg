<?php
// controllers/WeatherController.php
require_once 'models/Weather.php';

class WeatherController {
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        require 'views/dashboard.php';
    }

    public function fetchWeather() {
        $weather = new Weather();
        $city = $_POST['city'];
        $data = $weather->getWeather($city);
        echo json_encode($data);
    }
}
?>
