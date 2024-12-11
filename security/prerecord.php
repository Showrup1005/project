<?php
   session_start();
   if($_SESSION['security_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../login.php");
   //Sign Out code
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['security_login_status']="loged out";
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
    <header class="bg-primary py-3">
        <h1 class="text-center text-white">Welcome Officer</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sea Port<br><center>Authority</center></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="prerecord.php">Previous record</a>
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
       <h3 class="text-center mt-3">Previously Checked Ships</h3>
       <table class="table table-striped mt-3">
        <thead>
            <th>Ship Name</th>
            <th>Checking Date</th>
            <th>Verdict</th>
        </thead>
        <tbody>
        <?php
            include("../connection.php");
            $oid=$_SESSION['user_id'];
            $sql = "select * from previous_ship_record where oid='$oid'";
            $r=mysqli_query($con,$sql);
            if(mysqli_num_rows($r)>0)
            {  
                while($row=mysqli_fetch_array($r))
                {
                    echo "
                    <tr>
                        <td>$row[sname]</td>
                        <td>$row[currentdate]</td>
                        <td>$row[reason]</td>
                    </tr>
                    ";
                }
            }
            else
            {
                echo "<tr><td colspan='3' style='text-align: center';>No ship checked yet</td></tr>";
            }
        ?>
        </tbody>
       </table>
     </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>