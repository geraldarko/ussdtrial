<?php

// Read the variables sent via POST from our USSD API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// Split the text input by '*' to get an array of user input options
$inputOptions = explode('*', $text);

// Get the last input option from the array
$lastInputOption = end($inputOptions);

// Determine the current level of the USSD menu based on the count of input options
$currentLevel = count($inputOptions);

// Initialize response
$response = "";

// Check if user input is empty
if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response = "CON Welcome to Akuafo, what would you like to check? \n";
    $response .= "1) Farm Sensor Readings \n";
    $response .= "2) Irrigation Control";
    
} else {
    // Check the current level of the USSD menu and provide appropriate response
    switch ($currentLevel) {
        case 1:
            // Level 1 response
            switch ($lastInputOption) {
                case 1:
                    // Business logic for first level response - Farm Sensor Readings
                    $response = "CON Your Farm Readings are\n";
                    $response .= "Humidity sensor:\n";
                    $response .= "Temperature sensor:\n";
                    $response .= "Soil moisture sensor:\n";
                    $response .= "Water level sensor:\n";
                    $response .= "Press 0 to return to main menu\n";
                    break;
                case 2:
                    // Business logic for first level response - Irrigation Control
                    $response = "CON Turn pump on/off \n";
                    $response .= "1) Turn On \n";
                    $response .= "2) Turn Off";
                    break;
                default:
                    // Invalid input, display error message
                    $response = "CON Invalid input. Press 0 to return to main menu";
                    break;
            }
            break;
        case 2:
            // Level 2 response
            switch ($lastInputOption) {
                case 0:
                    // User selected option to go back to main menu
                    $response = "CON Welcome to Akuafo, what would you like to check? \n";
                    $response .= "1) Farm Sensor Readings \n";
                    $response .= "2) Irrigation Control";
                    break;
                case 1:
                    // Business logic for turning the pump on
                    $response = "END Pump will be turned on (this might take a few seconds)";
                    break;
                case 2:
                    // Business logic for turning the pump off
                    $response = "END Pump will be turned off (this might take a few seconds)";
                    break;
                default:
                    // Invalid input, display error message
                    $response = "CON Invalid input. Press 0 to return to main menu";
                    break;
            }
            break;
        default:
            // Invalid input, display error message
            $response = "CON Invalid input. Press 0 to return to main menu";
            break;
    }
}

// Echo the response back to the USSD API
header('Content-type: text/plain');
echo $response;

?>
