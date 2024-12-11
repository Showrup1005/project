<?php
   session_start();
   if($_SESSION['employee_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
    header("Location:../index.php");
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['employee_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index.php");    
   }
?>
<html>
<head>
<title>Change password</title>
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
                    <a class="nav-link" href="prerecord.php">Previous Record</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="changepass.php">Change password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?sign=out">Log out</a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <form action="changepass.php" method="post" class="row g-3">
            <div class="col-12">
                <label for="opass" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="opass" name="opass">
            </div>
            <div class="col-12">
                <label for="npass" class="form-label">New Password</label>
                <input type="password" class="form-control" id="npass" name="npass">
            </div>
            <div class="col-12">
                <label for="cpass" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpass" name="cpass">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">Change Password</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	include("../connection.php");
    $id=$_SESSION['user_id'];
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
	$cpass=$_POST['cpass'];
	if($npass==$cpass)
	{
	$sql="select password from employee where password='$opass' and e_id='$id'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>0)
    {
       $sql1="update employee set password='$npass' where e_id='$id'"; 
       if(mysqli_query($con,$sql1))
       {
         echo "Password Changed Successfully!";
       }  
    }
	else
	{
		echo "Old password does not match";
	}
	}
    else
    {
        echo "New password does not match with Confirm password";
    }
}
?>