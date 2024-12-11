<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Registration</title>
    <link rel="stylesheet" href="../reg.css">
</head>
<body>
<section class="container">
        <header>
            Registration Form
        </header>
        <form action="regemp.php" class="form" method="post">
            <div class="input-box">
                <label>Manager name</label>
                <input type="text" placeholder="Enter manager's name" name="name" required>
            </div>
            <div class="input-box">
                <label>Manager Id</label>
                <input type="text" placeholder="Enter manager's ID" name="e_id" required>
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
	$e_id=$_POST["e_id"];
    $activity=1;
	$query = "INSERT INTO employee (`e_name`, `activity`, `e_id`, `password`)
          VALUES ('$name', $activity, '$e_id', '$pass')";

    
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