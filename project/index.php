<?php
// index.php
require_once 'controllers/AuthController.php';
require_once 'controllers/WeatherController.php';

$url = explode('/', rtrim($_GET['url'] ?? '', '/'));

if ($url[0] === 'login') {
    (new AuthController())->login();
} elseif ($url[0] === 'handleLogin') {
    (new AuthController())->handleLogin();
} elseif ($url[0] === 'register') {
    (new AuthController())->register();
} elseif ($url[0] === 'handleRegister') {
    (new AuthController())->handleRegister();
} elseif ($url[0] === 'dashboard') {
    (new WeatherController())->dashboard();
} elseif ($url[0] === 'fetchWeather') {
    (new WeatherController())->fetchWeather();
} elseif ($url[0] === 'logout') {
    (new AuthController())->logout();
} else {
    header('Location: /login');
}
?>
