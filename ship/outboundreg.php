<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../reg.css">
</head>
<body>
    <section class="container">
        <header>
            Registration Form
        </header>
        <form action="outboundreg.php" class="form" method="post">
            <div class="input-box">
                <label>Departure Date</label>
                <input type="date" name="ddate" required>
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
include("../connection.php");
if(isset($_POST["submit"])){
	$sid=$_SESSION['user_id'];
    $noc=$_POST["noc"];
    $stat='Ready';
    $ddate=$_POST["ddate"];
    $currentdate=date("Y-m-d");
    $sql="select name,pass from ship where sid='$sid'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>0)
    {
        $row=mysqli_fetch_array($r);
        $name=$row['name'];
	    $pass=$row['pass'];
    }
    else{
        echo  "<p class='error-message'>Error: " . mysqli_error($con) . "</p>";
    }
    $sql1="select * from ship where name='$name' and sid='$sid' and stat <> 'Departed' and stat <> 'Disapproved'";
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)==0){
        $sql="select count(ship_no) ship_no from ship";
        $result=mysqli_query($con,$sql);
        if($result) {
            $row = mysqli_fetch_assoc($result);
            $ship_no=$row['ship_no']+1;
        }
        $query="insert into ship (name,sid,pass,noc,stat,ddate,ship_no,adate) values('$name','$sid','$pass',$noc,'$stat','$ddate',$ship_no,'$currentdate')";
        if(mysqli_query($con,$query))
        {
            die("Registered successfully");
        }
        else
        {
            echo  "<p class='error-message'>Error: " . mysqli_error($con) . "</p>";
        }  
    }
    else{
        echo "Ship is already registered";
    }
}
?>