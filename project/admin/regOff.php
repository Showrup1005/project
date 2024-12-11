<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Registration</title>
    <link rel="stylesheet" href="../reg.css">
</head>
<body>
<section class="container">
        <header>
            Registration Form
        </header>
        <form action="regOff.php" class="form" method="post">
            <div class="input-box">
                <label>Officer name</label>
                <input type="text" placeholder="Enter officer's name" name="name" required>
            </div>
            <div class="input-box">
                <label>Officer Id</label>
                <input type="text" placeholder="Enter officer's ID" name="oid" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="Enter password" name="pass" required>
            </div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </section>
</body>
</html>
<?php
include("../connection.php");
if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$pass=$_POST["pass"];
	$oid=$_POST["oid"];
    $situation=1;
	$query = "INSERT INTO secured (`oname`, `situation`, `oid`, `password`)
          VALUES ('$name', $situation, '$oid', '$pass')";

    
	if(mysqli_query($con,$query))
	{
		echo "registered successfully";
    }
	else
	{
		echo  "You are trying to give same id to two different officers";
	}
}
?>