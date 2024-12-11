<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ship Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4 class="text-center mb-4">Update Ship status</h4>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="sid" class="form-label">Ship ID</label>
                        <input type="text" class="form-control" name="sid" id="sid">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Current Status</label>
                        <select name="status" class="form-select" id="status_select">
                            <option value="?">Called to dock</option>
                            <option value="Ready">Ready to Load</option>
                            <option value="Checked">Checked</option>
                            <option value="Departed">Departed</option>
                            <option value="Disapproved">Disapproved</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Search" name="search">
                    </div>
                </form>
                <?php
                include("../connection.php");
                if(isset($_POST["search"])){
                    $id = $_POST["sid"];
                    $status = $_POST["status"];
                    $sql = "select name, sid, adate, ddate, stat FROM ship WHERE sid='$id' AND stat='$status'";
                    $r = mysqli_query($con, $sql);
                    if(mysqli_num_rows($r) > 0) {
                ?>
                <form action="updateship.php" method="get">
                    <table class="table table-striped">
                        <thead>
                            <th>Ship Name</th>
                            <th>Ship ID</th>
                            <th>Calling Date</th>
                            <th>Departing Date</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <?php
                        while($row = mysqli_fetch_array($r)) {
                            echo "
                            <tr>
                               <td>".$row['name']."</td>
                               <td>".$row['sid']."</td>
                               <td>".$row['adate']."</td>
                               <td>".$row['ddate']."</td>
                               <td>".$row['stat']."</td>  
                               <td>
                               <input type='hidden' name='sid' value='".$row['sid']."'>
                               <input type='hidden' name='adate' value='".$row['adate']."'>
                               <input type='submit' name='update' value='Update' class='btn btn-primary'>                               
                               </td> 
                            </tr>
                            ";
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
                <?php
                     }
                     else{
                        echo "No ships of that kind";
                     }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
