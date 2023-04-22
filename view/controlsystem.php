  <!-- Template Citation
 Circl creative admin theme
 latest Bootstrap 5 Framework.
-->

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
        <title>Akuafo Control System</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="../plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">

      
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
      <!-- <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
          <span class='sr-only'>Loading...</span>
        </div>
      </div> -->

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
                  <!-- <a class="navbar-brand" href="index.html"></a> -->
                  <!--<a href="index.php">AKUAFO</a>-->
                </div>
                <div class="" id="headerNav">
                  <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../images/avatars/avatar.jpg" alt=""></a>
                      <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                        <a class="dropdown-item" href="#"><i data-feather="edit"></i>Farm Recordings<span class="badge rounded-pill bg-success">12</span></a>
                        <a class="dropdown-item" href="#"><i data-feather="check-circle"></i>Tasks</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i data-feather="settings"></i>Change Password</a>
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
              <li>
                <a href="dashboard.php"><i data-feather="home"></i>Dashboard</a>
              </li>
            <li>
              <a href="farmrecordings.php"><i data-feather="inbox"></i>Farm Recordings</a>
            </li>
            <li>
              <li class="active-page">
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
                    <div class="col-lg">
                    <div class="card" id="blockui-card-1">
                        <div class="card-body">
                          <center>
                            <h5 class="card-title">Start Irrigation</h5>
                            <p>Clicking on the button below will water your crop.</p>
                            <a href="#" id="blockui-1" class="btn btn-primary" onclick="startPump()">Start</a>
                          </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                          <center>
                            <h5 class="card-title">Stop Irrigation</h5>
                            <p>Clicking on the button below will stop the watering of crops</p>
                            <a href="#" id="blockui-2" class="btn btn-primary" onclick="stopPump()">Stop</a>
                          </center>
                        </div>
                    </div>
                </div>
                <center>
                  <h4>Status: Off</h4>
                </center>
                  </div>
                </div>
                  
              </div>
              
            </div>
        
        <!-- Javascripts -->

        <script>
        // Function to start the pump
        function startPump() {
                var URL 
                URL = 'true';
                var xhr = new XMLHttpRequest();
                xhr.open('GET', URL, true);
                xhr.send();
        }

        // Function to stop the pump
        function stopPump() {
                var URL 
                URL = 'false';
                var xhr = new XMLHttpRequest();
                xhr.open('GET', URL, true);
                xhr.send();
        }
        </script>

        <script src="../plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="../plugins/perfectscroll/perfect-scrollbar.min.js"></script>
        <script src="../plugins/blockui/jquery.blockUI.js"></script>
        <script src="../js/main.min.js"></script>
        <script src="../js/pages/blockui.js"></script>
    </body>
</html>