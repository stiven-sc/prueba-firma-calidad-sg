<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'weather_app');

define('API_KEY', 'YOUR_OPENWEATHER_API_KEY');

function connect() {
    return new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}
?>
