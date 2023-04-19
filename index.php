<?php


// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// Variable to keep track of current state/level
$currentLevel = 0;

// Main logic
if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response = "CON Welcome to Akuafo, what would you like to check? \n";
    $response .= "1) Farm Sensor Readings \n";
    $response .= "2) Irrigation Control";
    $currentLevel = 0;
} else {
    // Check current level
    switch ($currentLevel) {
        case 0:
            // Business logic for first level response
            if ($text == "1") {
                $response = "CON Your Farm Readings are\n";
                $response .= "Humidity sensor:\n";
                $response .= "Temperature sensor:\n";
                $response .= "Soil moisture sensor:\n";
                $response .= "Water level sensor:\n";
                $response .= "0. Back\n";
                $currentLevel = 1;
            } else if ($text == "2") {
                $response = "CON Turn pump on/off \n";
                $response .= "1. Turn ON \n";
                $response .= "2. Turn OFF \n";
                $response .= "0. Back";
                $currentLevel = 2;
            } else {
                // Invalid input, go back to main menu
                $response = "CON Welcome to Akuafo, what would you like to check? \n";
                $response .= "1) Farm Sensor Readings \n";
                $response .= "2) Irrigation Control";
                $currentLevel = 0;
            }
            break;
        case 1:
            // Business logic for second level response - Farm Sensor Readings
            if ($text == "0") {
                // Go back to main menu
                $response = "CON Welcome to Akuafo, what would you like to check? \n";
                $response .= "1) Farm Sensor Readings \n";
                $response .= "2) Irrigation Control";
                $currentLevel = 0;
            } else {
                // Invalid input, go back to main menu
                $response = "CON Welcome to Akuafo, what would you like to check? \n";
                $response .= "1) Farm Sensor Readings \n";
                $response .= "2) Irrigation Control";
                $currentLevel = 0;
            }
            break;
        case 2:
            // Business logic for second level response - Irrigation Control
            if ($text == "1") {
                $response = "END Pump will be turned on (this might take a few seconds)";
                $currentLevel = 0;
            } else if ($text == "2") {
                $response = "END Pump will be turned off (this might take a few seconds)";
                $currentLevel


// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>

