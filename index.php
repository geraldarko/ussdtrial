<?php

// Set initial state to start
$state = "start";

while ($state !== "end") {
    // Read the variables sent via POST from our USSD API
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];

    if ($state == "start") {
        // This is the first request. Note how we start the response with CON
        $response = "CON Welcome to Akuafo, what would you like to check? \n";
        $response .= "1) Farm Sensor Readings \n";
        $response .= "2) Irrigation Control";
        $state = "main_menu";
        
    } else if ($state == "main_menu") {
        if ($text == "1") {
            // Business logic for first level response
            $response = "CON Your Farm Readings are\n";
            $response .= "Humidity sensor:\n";
            $response .= "Temperature sensor:\n";
            $response .= "Soil moisture sensor:\n";
            $response .= "Water level sensor:\n";
            $response .= "Press 0 to return to main menu\n";
            $state = "farm_readings";
            
        } else if ($text == "2") {
            // Business logic for first level response
            $response = "CON Turn pump on/off \n";
            $response .= "1) Turn On \n";
            $response .= "2) Turn Off";
            $state = "irrigation_control";
            
        } else {
            // Invalid input, display error message
            $response = "CON Invalid input. Press 0 to return to main menu";
            $state = "main_menu";
        }
        
    } else if ($state == "farm_readings") {
        if ($text == "0") {
            // User selected option to go back to main menu
            $response = "CON Welcome to Akuafo, what would you like to check? \n";
            $response .= "1) Farm Sensor Readings \n";
            $response .= "2) Irrigation Control";
            $state = "main_menu";
            
        } else {
            // Invalid input, display error message
            $response = "CON Invalid input. Press 0 to return to main menu";
            $state = "farm_readings";
        }
        
    } else if ($state == "irrigation_control") {
        if ($text == "1") {
            // Business logic for turning the pump on
            $response = "END Pump will be turned on (this might take a few seconds)";
            $state = "end";
            
        } else if ($text == "2") {
            // Business logic for turning the pump off
            $response = "END Pump will be turned off (this might take a few seconds)";
            $state = "end";
            
        } else {
            // Invalid input, display error message
            $response = "CON Invalid input. Press 0 to return to main menu";
            $state = "irrigation_control";
        }
    }

    // Echo the response back to the USSD API
    header('Content-type: text/plain');
    echo $response;
}
?>
