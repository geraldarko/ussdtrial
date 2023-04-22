<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akuafo_db";
// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Query the database for the data you want
$sql = "SELECT SensorData_Id, humidity, temperature, soil_moisture, water_level FROM sensor_data";
$result = mysqli_query($conn, $sql);

// Store the data in arrays for use in the graph
$data_points = array();
$humidity_points = array();
$temperature_points = array();
$soil_moisture_points = array();
$water_level_points = array();

while ($row = mysqli_fetch_assoc($result)) {
  $data_points[] = $row['SensorData_Id'];
  $humidity_points[] = $row['humidity'];
  $temperature_points[] = $row['temperature'];
  $soil_moisture_points[] = $row['soil_moisture'];
  $water_level_points[] = $row['water_level'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Sensor Data Graph</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>
<body>
  <canvas id="myChart"></canvas>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($data_points); ?>,
        datasets: [{
          label: 'Humidity',
          data: <?php echo json_encode($humidity_points); ?>,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }, {
          label: 'Temperature',
          data: <?php echo json_encode($temperature_points); ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }, {
          label: 'Soil Moisture',
          data: <?php echo json_encode($soil_moisture_points); ?>,
          backgroundColor: 'rgba(255, 206, 86, 0.2)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
        }, {
          label: 'Water Level',
          data: <?php echo json_encode($water_level_points); ?>,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Sensor Data ID'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]