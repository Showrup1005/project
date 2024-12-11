<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <section class="container">
        <header>
            Registration Form
        </header>
        <form action="reg.php" class="form" method="post">
            <div class="input-box">
                <label>Ship name</label>
                <input type="text" placeholder="Enter ship's name" name="name" required>
            </div>
            <div class="input-box">
                <label>Ship Id</label>
                <input type="text" placeholder="Enter ship's ID" name="sid" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="Enter password" name="pass" required>
            </div>
            <div class="column">
            <div class="input-box">
                <label>Arrival Date</label>
                <input type="date" name="adate" required>
            </div>
            <div class="input-box">
                <label>Departure Date</label>
                <input type="date" name="ddate" required>
            </div>
            </div>
            <div class="input-box">
                <label>No. of containers:</label>
                <input type="text" placeholder="Enter amount of containers" name="noc" required>
            </div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </section>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST["submit"])){
	$sname=$_POST["name"];
    $name=trim($sname);
	$pass=$_POST["pass"];
	$sid=$_POST["sid"];
    $adate=$_POST["adate"];
    $ddate=$_POST["ddate"];
    $noc=$_POST["noc"];
    $stat = '?';
    $sql1="select * from ship where name='$name' and sid='$sid' and stat <> 'Departed' and stat <> 'Disapproved'";
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)==0){
        if(strtotime($adate) < strtotime($ddate)){
            $sql="select count(ship_no) ship_no from ship";
            $result=mysqli_query($con,$sql);
            if($result) {
                $row = mysqli_fetch_assoc($result);
                $ship_no=$row['ship_no']+1;
            }
            $query="insert into ship values($ship_no,'$name','$sid','$pass','$adate','$ddate',$noc,'$stat')";
            if(mysqli_query($con,$query))
            {
                die("Registered successfully"); 
            }
        }
        else{
            echo "Your submission of arrival date and departure date is not rightly formed";
        }
    }
    else{
        echo "Ship is already registered";
    }
}  
?>