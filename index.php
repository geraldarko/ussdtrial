<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
	$response = "CON What would you want to check? \n";
	$response .= "1. Farm Sensor Readings \n";
	$response .= "2. Farm Pump Status";
    
} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Farm Status\n \n";
	$response .= "Humidity sensor";
	$response .= "\nTemperature sensor";
	$response .= "\nSoil moisture sensor";
	$response .= "\nWater level sensor";
	$response .= "\nPress 0 to return to main menu";




}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>