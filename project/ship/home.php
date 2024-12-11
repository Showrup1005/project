<?php
   session_start();
   if($_SESSION['ship_login_status']!="loged in" and ! isset($_SESSION['user_id']))
    header("Location:../login.php");
   //Sign Out code
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['ship_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/home.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }
        .header-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .navbar {
            background-color: #000;
            color: #fff;
        }
        .navbar a:hover {
            background-color: #343a40;
            color: #fff;
        }
        .main {
            padding-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="position-relative">
        <img src="../ship.jpg" alt="Ship Image">
        <div class="header-overlay">
            <h1>Welcome to Chattogram Sea Port</h1>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-light" href="#">Sea Port Authority</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="home.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="changepass.php">Change password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?sign=out">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register Incoming Ship</h5>
                        <p class="card-text">Click here to register ships for docking</p>
                        <a href="inboundreg.php" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register Outgoing Ship</h5>
                        <p class="card-text">Click here to register ships for loading cargo</p>
                        <a href="outboundreg.php" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ship cost</h5>
                        <p class="card-text">Click here to see the amount of port charges</p>
                        <a href="port_charges.php" class="btn btn-primary">Costs</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ship Records</h5>
                        <p class="card-text">Click here to see recent activities of your ship</p>
                        <a href="prerecord.php" class="btn btn-primary">Activities</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Complain Area</h5>
                        <p class="card-text">Click here to complain regarding ship or authority</p>
                        <a href="complain.php" class="btn btn-primary">Complain</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
