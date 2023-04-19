

<?php

//reads variables sent via method post
$sessionid = $_POST['SensorDateId'];
$serviceCode = $_POST['serviceCode'];
$text = $_POST['text'];
$humidity = $_POST['humidity'];
$temperature = $_POST['temperature'];
$soilmoisture = $_POST['soilmoisture'];
$waterlevel = $_POST['waterlevel'];

if ($text == ""){
	$response = "CON What would you want to check? \n";
	$response .= "1. Farm Sensor Readings \n";
	$response .= "2. Farm Pump Status";
}else if ($text == "1"){
	$response = "CON Farm Status\n";
	$response .= "Humidity sensor".$humidity;
	$response .= "\nTemperature sensor".$temperature;
	$response .= "\nSoil moisture sensor".$soilmoisture;
	$response .= "\nWater level sensor".$waterlevel;
	$response .= "\nPress 0 to return to main menu";
}else if ($text == "1*0"){
	$text == "";
	break;
}else if ($text == "2"){
	$response = "CON Turn pump on/off \n";
	$response .= "1. Turn ON \n";
	$response .= "1. Turn OFF";
}else if ($text == "2*1"){
	$response = "END Pump will be turn on(this might take a few seconds)";
}else if($text == "2*2"){
	$response = "END Pump will be turn off(this might take a few seconds)";
}

header('Content-type: text/plain');
echo $response;

?>