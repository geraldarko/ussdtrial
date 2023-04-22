  <!-- Template Citation
 Circl creative admin theme
 latest Bootstrap 5 Framework.
-->

<?php
//include_once ("../controllers/IOT.php");
//  23wsinclude_once("../classes/customer_class.php");

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "akuafo_db";

$servername = "us-cdbr-east-06.cleardb.net";
$username = "bf2c0c01ffee34";
$password = "c513e60b";
$dbname = "heroku_6f21400d1c5e59a";

$conn = new mysqli($servername, $username, $password, $dbname); 
$sql="SELECT * FROM sensor_data ORDER BY SensorDataId DESC LIMIT 1";
$result= mysqli_query($conn,$sql);
//  echo "HERE";

$row=mysqli_fetch_assoc($result);

$Time=$row['Date'];
$SensorDataId=$row['SensorDataId'];
$humidity=$row['humidity'];
$temperature=$row['temperature'];
$soilmoisture=$row['soilmoisture'];
$waterlevel=$row['waterlevel'];

// Query database for soil moisture data
$sql = "SELECT SensorDataId, soilmoisture FROM sensor_data";
$result = mysqli_query($conn, $sql);

// Create array to hold data for soil moisture graph
$soil_moisture_data = array();
while($row = mysqli_fetch_assoc($result)) {
    $soil_moisture_data[] = $row;
}

// Convert soil moisture data to JSON format
$json_soil_moisture_data = json_encode($soil_moisture_data);

// Query database for temperature data
$sql = "SELECT SensorDataId, temperature FROM sensor_data";
$result = mysqli_query($conn, $sql);

// Create array to hold data for temperature graph
$temperature_data = array();
while($row = mysqli_fetch_assoc($result)) {
    $temperature_data[] = $row;
}

// Convert temperature data to JSON format
$json_temperature_data = json_encode($temperature_data);

// Query database for water level data
$sql = "SELECT SensorDataId, waterlevel FROM sensor_data";
$result = mysqli_query($conn, $sql);

// Create array to hold data for water level graph
$water_level_data = array();
while($row = mysqli_fetch_assoc($result)) {
    $water_level_data[] = $row;
}

// Convert water level data to JSON format
$json_water_level_data = json_encode($water_level_data);

// Query database for humidity data
$sql = "SELECT SensorDataId, humidity FROM sensor_data";
$result = mysqli_query($conn, $sql);

// Create array to hold data for humidity graph
$humidity_data = array();
while($row = mysqli_fetch_assoc($result)) {
    $humidity_data[] = $row;
}

// Convert humidity data to JSON format
$json_humidity_data = json_encode($humidity_data);

// Close database connection
mysqli_close($conn);

// Check the soil moisture level
// if ($soilmoisture < 20) {
//     $message = "Warning: Soil moisture level is low!";
//     $status = "danger";
// } else if ($soilmoisture > 80) {
//     $message = "Warning: Soil moisture level is high!";
//     $status = "warning";
// } else {
//     $message = "Soil moisture level is normal";
//     $status = "success";
// }

// Display the notification
// echo '<div class="alert alert-' . $status . '">' . $message . '</div>';
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Akuafo Dashboard</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="../plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
        <link href="../plugins/apexcharts/apexcharts.css" rel="stylesheet">

      
        <!-- Theme Styles -->
        <link href="../css/main.min.css" rel="stylesheet">
        <link href="../css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
      <div class='loader'>
        <!-- <div class='spinner-grow text-primary' role='status'>
          <span class='sr-only'>Loading...</span>
        </div> -->
      </div>
        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand-lg d-flex justify-content-between">
                  <div class="" id="navbarNav">
                    <ul class="navbar-nav" id="leftNav">
                      <li class="nav-item">
                        <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                      </li>
                    </ul>
                    </div>
                    <div class="logo">


                      <!-- <a class="navbar-brand" href="index.php"></a> -->
                  <!--<a href="index.php">AKUAFO</a>-->
                  </div>
                    <div class="" id="headerNav">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../images/avatars/avatar.jpg" alt=""></a>
                          <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                            <a class="dropdown-item" href="../view/farmrecordings.php"><i data-feather="edit"></i>Farm Recordings<span class="badge rounded-pill bg-success">12</span></a>
                            <a class="dropdown-item" href="../view/newfarm.php"><i data-feather="check-circle"></i>Tasks</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../view/changepassword.php"><i data-feather="settings"></i>Change Password</a>
                            <a class="dropdown-item" href="../actions/logout.php"><i data-feather="log-out"></i>Logout</a>
                          </div>
                        </li>
                      </ul>
                  </div>
                </nav>
            </div>
            <div class="page-sidebar">
                <ul class="list-unstyled accordion-menu">
                  <li class="sidebar-title">
                  </li>
                  <li class="active-page">
                    <a href="index.php"><i data-feather="home"></i>Dashboard</a>
                  </li>
                  <li>
                    <a href="farmrecordings.php"><i data-feather="inbox"></i>Farm Recordings</a>
                  </li>
                  <li>
                    <a href="controlsystem.php"><i data-feather="calendar"></i>Control System</a>
                  </li>
                  <li>
                    <a href="history.php"><i data-feather="clock"></i>Archives</a>
                  </li>
                </ul>
            </div>
            <div class="page-content">
              <div class="main-wrapper">
                <div class="row">
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">Humidity</h5>
                              <!--<h2>4940</h2> -->
                              <div class="card-footer text-muted" title="<?php echo $Time; ?>" style="text-align:center;">Last updated on: <?php echo $Time; ?></div><h2>
                              <?php echo $humidity; ?></h2>
                              <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">Temperature</h5>
                        <!--<h2>4940</h2> -->
                              <div class="card-footer text-muted" title="<?php echo $Time; ?>" style="text-align:center;">Last updated on: <?php echo $Time; ?></div>
                              <h2><?php echo $temperature; ?></h2>
                              <!--<p>Date</p> -->
                              <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">Soil moisture</h5>
                            <!--<h2>4940</h2> -->
                            <div class="card-footer text-muted" title="<?php echo $Time; ?>" style="text-align:center;">Last updated on: <?php echo $Time; ?></div>                             
                            <h2><?php echo $soilmoisture; ?></h2>
                              <!--<p>Date</p> -->
                              <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;">Water Level</h5>
                              <div class="card-footer text-muted" title="<?php echo $Time; ?>" style="text-align:center;">Last updated on: <?php echo $Time; ?></div>
                              <h2><?php echo $waterlevel; ?></h2>
                              <!--<p>Date</p> -->
                              <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <style>
              .chart-container {
              width: 45%;
              margin: 20px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 5px;
              box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
              padding: 10px;
            }

            .chart-title {
              font-size: 18px;
              font-weight: bold;
              margin-bottom: 10px;
              text-align: center;
            }
            </style>

            <div class="chart-container">
              <h2 class="chart-title">Soil Moisture</h2>
              <canvas id="soilMoistureChart"></canvas>
            </div>

            <div class="chart-container">
              <h2 class="chart-title">Temperature</h2>
              <canvas id="temperatureChart"></canvas>
            </div>

            <div class="chart-container">
              <h2 class="chart-title">Humidity</h2>
              <canvas id="humidityChart"></canvas>
            </div>

            <div class="chart-container">
              <h2 class="chart-title">Water Level</h2>
              <canvas id="waterLevelChart"></canvas>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
              // Convert JSON data to JavaScript arrays for each chart
              var soilMoistureData = <?php echo $json_soil_moisture_data ?>;
              var temperatureData = <?php echo $json_temperature_data ?>;
              var humidityData = <?php echo $json_humidity_data ?>;
              var waterLevelData = <?php echo $json_water_level_data ?>;

              // Create arrays to hold labels and values for each chart
              var soilMoistureLabels = [];
              var soilMoistureValues = [];
              soilMoistureData.forEach(function(item) {
                  soilMoistureLabels.push(item.SensorDataId);
                  soilMoistureValues.push(item.soilmoisture);
              });

              var temperatureLabels = [];
              var temperatureValues = [];
              temperatureData.forEach(function(item) {
                  temperatureLabels.push(item.SensorDataId);
                  temperatureValues.push(item.temperature);
              });

              var humidityLabels = [];
              var humidityValues = [];
              humidityData.forEach(function(item) {
                  humidityLabels.push(item.SensorDataId);
                  humidityValues.push(item.humidity);
              });

              var waterLevelLabels = [];
              var waterLevelValues = [];
              waterLevelData.forEach(function(item) {
                  waterLevelLabels.push(item.SensorDataId);
                  waterLevelValues.push(item.waterlevel);
              });

              // Create charts using Chart.js
              var soilMoistureChart = new Chart(document.getElementById("soilMoistureChart"), {
                type: 'line',
                data: {
                    labels: soilMoistureLabels,
                    datasets: [{
                        label: 'Soil Moisture',
                        data: soilMoistureValues,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                }
              });

              var temperatureChart = new Chart(document.getElementById("temperatureChart"), {
                type: 'line',
                data: {
                    labels: temperatureLabels,
                    datasets: [{
                        label: 'Temperature',
                        data: temperatureValues,
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                    }]
                }
              });

              var humidityChart = new Chart(document.getElementById("humidityChart"), {
                type: 'line',
                data: {
                    labels: humidityLabels,
                    datasets: [{
                        label: 'Humidity',
                        data: humidityValues,
                        fill: false,
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.1
                    }]
                }
              });

              var waterLevelChart = new Chart(document.getElementById("waterLevelChart"), {
                type: 'line',
                data: {
                    labels: waterLevelLabels,
                    datasets: [{
                        label: 'Water Level',
                        data: waterLevelValues,
                        fill: false,
                        borderColor: 'rgb(153, 102, 255)',
                        tension: 0.1
                    }]
                }
              });

            </script>
          
        <!-- Javascripts -->
        <script src="../plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../plugins/apexcharts/apexcharts.min.js"></script>
        <script src="../js/main.min.js"></script>
        <script src="../js/pages/dashboard.js"></script>
    </body>
</html>

