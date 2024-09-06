<?php
// models/Weather.php
require 'config.php';

class Weather {
    public function getWeather($city) {
        $apiKey = API_KEY;
        $url = "https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=44.34&lon=10.99&appid={API key}";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        // Insertar el clima en la base de datos
        $db = connect();
        $stmt = $db->prepare("INSERT INTO weather_data (user_id, city, temperature, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $_SESSION['user_id'], $city, $data['main']['temp'], $data['weather'][0]['description']);
        $stmt->execute();
        
        return $data;
    }
}
?>
