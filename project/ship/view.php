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
    <title>Report Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }
        .navbar {
            background-color: #000;
            color: #fff;
        }
        .navbar a:hover {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Sea Port Authority</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="home.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Hi
                            <?php
                               include("../connection.php");
                               $id=$_SESSION['user_id'];
                               $query="select name from ship where sid='$id'";
                               $result=mysqli_query($con,$query);
                               if(mysqli_num_rows($result)>0){
                                $row1=mysqli_fetch_array($result);
                                echo "$row1[name]";
                               }
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?sign=out">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <img src="../ship.jpg" alt="Ship Image">
    <h4 class="my-4 text-center">Successfully Complained</h4>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
