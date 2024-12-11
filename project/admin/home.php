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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
</head>
<body>
<div class="main">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sea Port<br><center>Authority</center></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="security.php">Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee.php">Manager</a>
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
    </nav>
       <div class="container my-5">
        <div class="c-1">
            <div class="search">
            <form action="search1.php" method="get">
                <label for=''><h4>Search about ship:</h4></label><br>
                <input class="form-control me-2 srch-input" type="text" name="srch" placeholder="Search here" required>
                <a href="search1.php"><input type="submit" value="Search" name="insert" class="btn btn-primary mt-2"></a>
            </div>
            </form>
            <a href="#demo" data-bs-toggle="collapse"><b>For more speacialized search</b></a>
            <div id="demo" class="collapse mt-3">
                <form action="search.php" method="get">
                    <label for=""><h5>Current state of ship</h5></label><br>
                    <input type='radio' id='option1' name='options' value='?' required>
                    <label for='option1'>Called to dock</label><br>
                    <input type='radio' id='option8' name='options' value='Ready'>
                    <label for='option8'>Ready to load</label><br>
                    <input type='radio' id='option7' name='options' value='Checking'>
                    <label for='option7'>Checking</label><br>
                    <input type='radio' id='option2' name='options' value='Checked'>
                    <label for='option2'>Checked</label><br>
                    <input type='radio' id='option3' name='options' value='managing'>
                    <label for='option3'>Managing</label><br>
                    <input type='radio' id='option9' name='options' value='Loading'>
                    <label for='option9'>Loading cargo</label><br>
                    <input type='radio' id='option4' name='options' value='pending'>
                    <label for='option4'>Pending</label><br>
                    <input type='radio' id='option5' name='options' value='Departed'>
                    <label for='option5'>Departed</label><br>
                    <input type='radio' id='option6' name='options' value='Disapproved'>
                    <label for='option6'>Disapproved</label><br>
                    <a href="search.php"><input type="submit" value="Search" name="insert" class="btn btn-primary mt-4"></a>
                </form>
            </div>
            </div>
            <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Request Status Table</h5>
                        <p class="card-text">See the requests for docking ships here.</p>
                        <a href="requests.php" class="btn btn-primary">Requests</a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Monthly Report Table</h5>
                            <p class="card-text">Click here to see monthly activities</p>
                            <a href="monthly_reports.php" class="btn btn-primary">Reports</a>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Ship Status</h5>
                            <p class="card-text">Click here to update ship status</p>
                            <a href="shipupdate.php" class="btn btn-primary">Ship Status</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rececnt Activities</h5>
                        <p class="card-text">Click here to see recent activities</p>
                        <a href="recentact.php" class="btn btn-primary">Activities</a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Complain Table</h5>
                        <p class="card-text">Find out complains regarding ship here.</p>
                        <a href="complain.php" class="btn btn-primary">Complains</a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reporting Area</h5>
                        <p class="card-text">See reports from employees and officers.</p>
                        <a href="report_admin.php" class="btn btn-primary">Reports</a>
                    </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

