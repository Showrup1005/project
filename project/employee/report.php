<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
        }
        #comment {
            width: 95%;
            height: 200px; 
            resize: none; 
        }
    </style>
</head>
<body>     
	<div class="container mt-5">
		<form action="report.php" class="form" method="post">
			<div class="mb-3">
				<label for="comment" class="form-label">Report:</label>
				<textarea class="form-control" id="comment" name="comment" rows="4" cols="50" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="insert">Submit</button>
		</form>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
include("../connection.php");
if(isset($_POST['insert'])){
    $id=$_SESSION['user_id'];
    $comment=$_POST['comment'];
    $currentdate=date("Y-m-d");
    $query="select count(seriel_no) as seriel_no from report";
    $result=mysqli_query($con,$query);
    if($result){
        $row=mysqli_fetch_assoc($result);
        $seriel=$row['seriel_no'];
        $seriel_no=$seriel+1;
    }     
    $sql2="insert into report (seriel_no,e_id,descript,currentdate)
        values($seriel_no,'$id','$comment','$currentdate')";
    mysqli_query($con,$sql2);
    header("Location:view.php");
}

?>
