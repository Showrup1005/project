<?php
   session_start();
   if($_SESSION['admin_login_status'] != "loged in" && !isset($_SESSION['user_id'])) {
      header("Location:../login.php");
      exit(); 
   }
   // Sign Out code
   if(isset($_GET['sign']) && $_GET['sign'] == "out") {
      $_SESSION['admin_login_status_login_status'] = "loged out";
      unset($_SESSION['user_id']);
      header("Location:../index.php");
      exit(); 
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <header class="bg-primary py-3">
        <h1 class="text-center text-white">Welcome Admin</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Sea Port<br>
                <center>Authority</center>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="security.php">Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="employee.php">Manager</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="charges.php">Charges</a>
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
        </div>
    </nav>
    <div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="p-3">
                <h4 class="text-center mb-4">Register Manager</h4>
                <div class="text-center">
                    <a href="regemp.php" class="btn btn-outline-primary">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3">
                <h4 class="text-center mb-4">Fire Manager</h4>
                <div class="text-center">
                    <a href="fireemp.php" class="btn btn-outline-primary">Go</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="p-3">
                <h4 class="text-center mb-4">Assign Manager</h4>
                <div class="text-center">
                    <a href="assign_employee.php" class="btn btn-outline-primary">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3">
                <h4 class="text-center mb-4">Assign Manager to Outgoing ship</h4>
                <div class="text-center">
                    <a href="assign_outgoingemp.php" class="btn btn-outline-primary">Go</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-md-6">
            <div class="p-3">
                <h4 class="text-center mb-4">Manager Records</h4>
                <div class="text-center">
                    <a href="previous_recordemp.php" class="btn btn-outline-primary">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3">
                <h4 class="text-center mb-4">Currently Working Manager</h4>
                <div class="text-center">
                    <a href="currentworkingemp.php" class="btn btn-outline-primary">Go</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>