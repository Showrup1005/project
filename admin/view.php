<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   //Sign Out code
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
        }
        .nav1{
            margin-top: -16px;
            background-color: teal;
        }
        .navbar a:hover {
            background-color: #343a40;
            color: hsl(180, 100%, 50%);
        }
        h4 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <img src="../ship.jpg" alt="Ship Image">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid nav1">
            <a class="navbar-brand" href="#">Sea Port<br><center>Authority</center></a>
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?sign=out">Log out</a>
                    </li>
                </ul>
        </div>
    </nav>
    <h4 class="my-4 text-center">Successfully Completed</h4>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
