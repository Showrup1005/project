<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Managers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 my-5">
            <form action="" method="post">  
                <div class="mb-3">  
                    <label for="ships" class="form-label"><h4 class="mt-5">List of Ships</h4></label>   
                    <select name="sname" id="ships" class="form-select">
                        <?php
                            include("../connection.php");
                            $sql = "select name from ship where stat='Ready'";
                            $r = mysqli_query($con, $sql);
                            if(mysqli_num_rows($r) > 0) {
                                while($row = mysqli_fetch_array($r)) {
                                    $name = $row['name'];      
                                    echo "<option value='$name'>$name</option>";
                                }
                            } else {
                                echo "Error fetching ships: " . mysqli_error($con);
                            }
                        ?>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value='Search' name='submit'>
                </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])) {
        if(isset($_POST['sname'])) {
            $name = $_POST['sname'];
            include("../connection.php");
            $sql = "select e_name, e_id from employee where activity = 1";
            $r = mysqli_query($con, $sql);
            if(mysqli_num_rows($r) > 0) {
                echo "<form action='assign_outgoingemp.php' method='post'>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped'>";
                echo "<thead>
                      <tr>
                      <th>Employee Id</th>
                      <th>Employee Name</th>
                      </tr>
                      </thead>
                      <tbody>";
                while($row = mysqli_fetch_array($r)) {
                    $e_name = $row['e_name'];
                    $e_id = $row['e_id'];
                    echo "<tr>
                          <td><input type='checkbox' value='$e_id' name='e_id[]'>$e_id</td>
                          <td>$e_name</td>
                          </tr>";
                } 
                echo "</tbody>
                      </table>";
                echo "<input type='hidden' name='sname' value='$name'>";
                echo "<div class='text-center'>
                      <input name='insert' type='submit' value='Assign' class='btn btn-primary mt-2'>
                      </div>";
                echo "</form>
                      </div>";  
            } else {
                echo "<p class='text-center'>No active employees found.</p>";
            }
        } else {
            echo "<p class='text-center'>Please select a ship.</p>";
        }
    }
    ?>
    <?php
    include("../connection.php");
    if(isset($_POST['insert'])) {
        if(isset($_POST['sname'])) {
            $name=$_POST['sname'];
            $sql="update ship set stat='Loading' where name='$name' and stat='Ready'";
            mysqli_query($con,$sql);
            $sql1="select ship_no from ship where name='$name' and stat='Loading'";
            $r=mysqli_query($con, $sql1);
            if(mysqli_num_rows($r)>0)
            {           
                $row=mysqli_fetch_array($r);   
                $ship_no=$row['ship_no'];      
                $e_id=$_POST['e_id'];
                $task="pending";
                $currentdate=date("Y-m-d");
                foreach($e_id as $employee) {
                    $e_id=$employee;       
                    $sql2="insert into ship_employee (sname,ship_no,e_id,task,currentdate) values ('$name','$ship_no','$e_id','$task','$currentdate')";
                    mysqli_query($con, $sql2);
                    $query="update employee set activity = 0 where e_id = '$e_id'";
                    mysqli_query($con, $query);
                }       
                echo "<p class='text-center'>Successfully Assigned!</p>";
            } else {
                echo "<p class='text-center'>Error" . mysqli_error($con) . "</p>";
            }
        } else {
            echo "<p class='text-center'>Please select a ship.</p>";
        }
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
