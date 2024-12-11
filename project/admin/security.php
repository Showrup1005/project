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
    <title>Security</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sea Port<br><center>Authority</center></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="security.php">Security</a>
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
        </div>
    </nav>
    <div class="row justify-content-center my-3 mb-3">
        <div class="col-md-6">
            <div class="custom-select-wrapper">
                <label for="officers" class="form-label"><h4>List of officers</h4></label>
                 <select name="Officers" id="officers" class="form-select" onchange="redirectToNewPage()">
    <option value="">Select an officer</option> <!-- Add this empty option -->
    <?php
        include("../connection.php");
        $sql = "SELECT oname FROM secured WHERE situation=1";
        $r = mysqli_query($con, $sql);
        if(mysqli_num_rows($r) > 0) {
            while($row = mysqli_fetch_array($r)) {
                $oname = $row['oname'];
                echo "<option value='$oname'>$oname</option>";
            }
        } else {
            echo "error!" . mysqli_error($con);
        }
    ?>
</select>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-5 mb-5 mx-auto">
                <div class="btn-group w-100">
                    <h4 class="w-100 text-center">Register Officer</h4>
                    <a href="regOff.php" class="btn btn-outline-primary w-100">Go</a>
                </div>
            </div>
            <div class="col-md-5 mb-5 mx-auto">
                <div class="btn-group w-100">
                    <h4 class="w-100 text-center">Fire Officer</h4>
                    <a href="fireoff.php" class="btn btn-outline-primary w-100">Go</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-5 mx-auto">
                <div class="btn-group w-100">
                    <h4 class="w-100 text-center">Currently Working</h4>
                    <a href="currentworkingoff.php" class="btn btn-outline-primary w-100">Go</a>
                </div>
            </div>
            <div class="col-md-5 mb-5 mx-auto">
                <div class="btn-group w-100">
                    <h4 class="w-100 text-center">Previous Record</h4>
                    <a href="previous_recordoff.php" class="btn btn-outline-primary w-100">Go</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    function redirectToNewPage() {
        var selectedValue = document.getElementById("officers").value;
        window.location.href = "officers.php?selected_officer=" + selectedValue;
    }
</script>
</body>
</html>
