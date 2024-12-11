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
    <title>Previous Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/home.css">
</head>
<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sea Port<br><center>Authority</center></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="prerecord.php">Previous Record</a>
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
       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center mt-3">Previously Handled Ships</h3>
                <table class="table mt-3">
                    <thead>
                        <th>Ship Name</th>
                        <th>Date Assigned</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                    <?php
                        include("../connection.php");
                        $e_id=$_SESSION['user_id'];
                        $sql = "select * from ship_employee where e_id='$e_id'";
                        $r=mysqli_query($con,$sql);
                        if(mysqli_num_rows($r)>0)
                        {  
                            while($row=mysqli_fetch_array($r))
                            {
                                echo "
                                <tr>
                                    <td>$row[sname]</td>
                                    <td>$row[currentdate]</td>
                                    <td>$row[task]</td>
                                </tr>
                                ";
                            }
                        }
                        else{
                            echo "<tr><td colspan='3' style='text-align: center';>No ship checked yet</td></tr>";
                        } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>