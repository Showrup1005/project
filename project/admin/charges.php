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
    <title>Charges</title>
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
                    <a class="nav-link" href="security.php">Security</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employee.php">Manager</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="charges.php">Charges</a>
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
    <div class="container mt-3">
        <h3 class="text-center mt-3">Ship's Information</h3>
        <table class="table table-striped">
            <thead>
                <th>Ship Name</th>
                <th>Ship ID</th>
                <th>Landing Charge</th>
                <th>Port Handling Charge</th>
                <th>Total Cost</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                    include("../connection.php");
                    $sql="select * from charges where stat <> 'Disapproved' order by ship_no desc";
                    $r=mysqli_query($con,$sql);
                    if(mysqli_num_rows($r)>0)
                    {             
                        while($row=mysqli_fetch_array($r))
                        {
                            $port_handling=abs($row['days_difference'])*20;
                            $total_cost=300+$port_handling;
                            echo "
                            <tr>
                                <td>$row[name]</td>
                                <td>$row[sid]</td>
                                <td>$300</td>
                                <td>$$port_handling</td>
                                <td>$$total_cost</td>
                                <td>$row[stat]</td>
                            </tr>
                            ";
                        }
                    }
                    else{
                        echo "No ships of that criteria";
                    }
                ?>
            </tbody>
        </table>
    </div>
<div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
