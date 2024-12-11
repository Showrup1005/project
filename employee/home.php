<?php
   session_start();
   if($_SESSION['employee_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   //Sign Out code
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['employee_login_status']="loged out";
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
</head>
<body>
    <div class="">
        <header class="bg-primary py-3">
            <h1 class="text-center text-white">Welcome Manager</h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sea Port<br><center>Authority</center></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prerecord.php">Previous Record</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="changepass.php">Change password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?sign=out">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row mt-5">
            <div class="col-sm-4">
                <div class="card mx-2">
                <div class="card-body">
                    <h5 class="card-title">Unloading Ships</h5>
                    <p class="card-text">See if you are assigned to any ship to unload cargo</p>
                    <a href="inbound.php" class="btn btn-primary">See</a>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Loading Ships</h5>
                    <p class="card-text">See if you are assigned to any ship to load cargo</p>
                    <a href="outgoing.php" class="btn btn-primary">See</a>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mx-2">
                <div class="card-body">
                    <h5 class="card-title">Reporting Area</h5>
                    <p class="card-text">Click here to report regarding ship or authority</p>
                    <a href="report.php" class="btn btn-primary">See</a>
                </div>
                </div>
            </div>
        </div>
    </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
