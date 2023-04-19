<?php

// Read the variables sent via POST from our USSD API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response = "CON Welcome to Akuafo, what would you like to check? \n";
    $response .= "1) Farm Sensor Readings \n";
    $response .= "2) Irrigation Control";
    
} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Your Farm Readings are\n";
    $response .= "Humidity sensor:\n";
    $response .= "Temperature sensor:\n";
    $response .= "Soil moisture sensor:\n";
    $response .= "Water level sensor:\n";
    $response .= "Press 0 to return to main menu\n";

} else if ($text == "2") {
    // Business logic for first level response
    $response = "CON Turn pump on/off \n";
    $response .= "1) Turn On \n";
    $response .= "2) Turn Off";
    
} else if ($text == "1*0"){
    // User selected option to go back to main menu
    $response = "CON Welcome to Akuafo, what would you like to check? \n";
    $response .= "1) Farm Sensor Readings \n";
    $response .= "2) Irrigation Control";
    
} else if ($text == "2*1"){
    // Business logic for turning the pump on
    $response = "END Pump will be turned on (this might take a few seconds)";
    
} else if ($text == "2*2"){
    // Business logic for turning the pump off
    $response = "END Pump will be turned off (this might take a few seconds)";
    
} else {
    // Invalid input, display error message
    $response = "CON Invalid input. Press 0 to return to main menu";
}

// Echo the response back to the USSD API
header('Content-type: text/plain');
echo $response;

?>
