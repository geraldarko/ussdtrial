<?php

// Database connection constants
define("DATABASE", "c513e60b");
define("SERVER", "us-cdbr-east-06.cleardb.net");
define("USERNAME", "c513e60b");
define("PASSWD", "heroku_6f21400d1c5e59a");

// Create database connection
$conn = new mysqli(SERVER, USERNAME, PASSWD, DATABASE); 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $humidity = $_POST['humidity'];
// $temperature = $_POST['temperature'];
// $waterlevel = $_POST['waterlevel'];
// $soilmoisture = $_POST['soilmoisture'];

?>