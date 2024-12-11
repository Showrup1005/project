<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <div class="header">
            <h1>Login page</h1>
        </div>
        <div class="form">
            <form action="login.php" method="post">
                <div class="text_field">
                    <input type="text" name="id" required>
                    <span></span>
                    <label>ID</label>
                </div>
                <div class="text_field">
                    <input type="password" name="pass" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <input type="submit" name="login" value="Log in">
                <div class="sign_up">Want to dock a ship.<a href="reg.php">Register here</a><br>Want to load a ship 
                <a href="regoutgoing.php">Click here</a></div>
            </form>
        </div>   
    </div>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['login']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$sql="select aid,password from admin where aid='$id' and password='$pass'";
    $sql1="select oid,password from secured where oid='$id' and password='$pass'";
    $sql2="select e_id,password from employee where e_id='$id' and password='$pass'";
    $sql3="select sid,pass from ship where sid='$id' and pass='$pass'";
    $ad=mysqli_query($con,$sql);
    $sr=mysqli_query($con,$sql1);
    $em=mysqli_query($con,$sql2);
    $sh=mysqli_query($con,$sql3);
    if(mysqli_num_rows($ad)==1)
    {
        $_SESSION['user_id']=$id;
        $_SESSION['admin_login_status']="loged in";
        header("Location:admin/home.php");
    }
    else if(mysqli_num_rows($sr)>0)
    {
        $_SESSION['user_id']=$id;
        $_SESSION['security_login_status']="loged in";
        header("Location:security/home.php");
    }
    abcd;
    else if(mysqli_num_rows($em)>0)
    {
        $_SESSION['user_id']=$id;
        $_SESSION['employee_login_status']="loged in";
        header("Location:employee/home.php");
    }
    else if(mysqli_num_rows($sh)>0)
    {
        $_SESSION['user_id']=$id;
        $_SESSION['ship_login_status']="loged in";
        header("Location:ship/home.php");
    }
    else
    {
        echo "<p style='color: red;'>Incorrect UserId or Password</p>";
    }
}
?>