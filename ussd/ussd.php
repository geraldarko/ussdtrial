<?php

include "connection.php";

$json = file_get_contents('php://input');

// decode the json data
$data = json_decode($json, true);

$sessionID = $data['sessionID'];
$userID = $data['userID'];
$newSession = $data['newSession'];
$msisdn = $data['msisdn'];
$userData = $data['userData'];
$network = $data['network'];
$continueSession = false;


if ($newSession) {

    if ($text == "") {
        // This is the first request. Note how we start the response with CON
            $message = "Welcome to Akuafo, what would you like to check? \n";
            $message .= "1) Farm Sensor Readings \n";
            $message .= "2) Irrigation Control";
    }

    $continueSession = true;

}

if (!$newSession) {

    if ($text == "1") {

        // Business logic for first level response

            $readings = "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1";
            $results = mysqli_query($conn,$readings);
            
            var_dump($results);
            // $message = "Your Farm Readings are";
            // $message .= "\nHumidity sensor: ".$humidity;
            // $message .= "\nTemperature sensor: ".$temperature;
            // $message .= "\nSoil moisture sensor: ".$soilmoisture;
            // $message .= "\nWater level sensor: ".$waterlevel;
            // $message .= "Press 0 to return to main menu\n"
    }
}





// }   else if ($text == "2"){
//         $response = "CON Turn pump on/off \n";
//         $response .= "1. Turn ON \n";
//         $response .= "2. Turn OFF \n";
    
// }   else if ($text == "2*1"){
//         $response = "END Pump will be turn on(this might take a few seconds)";

// }   else if($text == "2*2"){
//         $response = "END Pump will be turn off(this might take a few seconds)";
// }

$response = [
    "sessionID" => $sessionID,
    "userID" => $userID,
    "msisdn" => $msisdn,
    "message" =>  $message,
    "continueSession" => $continueSession
  ];
//   return json_encode($response)

// Echo the response back to the API
// header('Content-type: text/plain');
var_dump ($response);
var_dump ($data);

?>