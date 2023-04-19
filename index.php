<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
	$response = "CON Welcome to Akuafo, what would you like to check? \n";
	$response .= "1. Farm Sensor Readings \n";
	$response .= "2. Irrigation Control";
    
} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Your Farm Status are\n";
	$response .= "Humidity sensor:\n";
	$response .= "Temperature sensor:\n";
	$response .= "Soil moisture sensor:\n";
	$response .= "Water level sensor:\n";
	$response .= "Press 0 to return to main menu\n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
	$response = "CON Turn pump on/off \n";
	$response .= "1. Turn On \n";
	$response .= "2. Turn Off";

// }else if ($text == "1*0"){
// 	$text == "";
// 	break;

// }else if ($text == "2*1"){
// 	$response = "END Pump will be turn on(this might take a few seconds)";
// }else if($text == "2*2"){
// 	$response = "END Pump will be turn off(this might take a few seconds)";
// }

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>