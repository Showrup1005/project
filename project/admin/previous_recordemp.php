<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Manager Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h4 class="text-center mb-4 mt-5">Search Manager Record</h4>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="e_id" class="form-label">Employee ID</label>
                        <select name="e_id" id="e_id" class="form-select">
                        <?php
                            include("../connection.php");
                            $sql="select e_id from employee";
                            $r=mysqli_query($con,$sql);
                            if(mysqli_num_rows($r)>0) {
                                while($row=mysqli_fetch_array($r)) {
                                    $e_id=$row['e_id'];
                                    echo "<option value='$e_id'>$e_id</option>";
                                }
                            } else {
                                echo "error!".mysqli_error($con);
                            }
                        ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Current Status</label>
                        <select name="status" class="form-select" id="status_select">
                            <option value="none">None</option>
                            <option value="pending">Pending</option>
                            <option value="done">Completed</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Search" name="search">
                    </div>
                </form>
                <?php
                include("../connection.php");
                if(isset($_POST["search"])){
                    $id = $_POST["e_id"];
                    $status = $_POST["status"];
                    if($status == "none"){
                        $sql="select * from ship_employee where e_id='$id'";
                    }
                    else{
                        $sql="select * from ship_employee where e_id='$id' and task='$status'";
                    }
                    $r = mysqli_query($con, $sql);
                    if(mysqli_num_rows($r) > 0) {
                ?>
                <h4 class="text-center mb-4 my-4">Employee Record</h4>
                <table class="table table-striped">
                    <thead>
                        <th>Ship Name</th>
                        <th>Date Assigned</th>
                        <th>Employee ID</th>
                        <th>Status/Reason</th>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($r)) {
                        echo "
                        <tr>
                            <td>".$row['sname']."</td>
                            <td>".$row['currentdate']."</td>
                            <td>".$row['e_id']."</td>  
                            <td>".$row['task']."</td> 
                        </tr>
                        ";
                    }
                    ?>
                    </tbody>
                </table>
                <a href="employee.php" class="btn btn-primary">Return to Employee Page</a>
                </form>
                <?php
                     }
                     else{
                        echo "No ships Checked of that category by the officer";
                     }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
