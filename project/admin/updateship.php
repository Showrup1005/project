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
                <?php
                include("../connection.php");
                if(isset($_GET['sid']) && isset($_GET['adate'])) {
                    $sid = $_GET['sid'];
                    $ardate = $_GET['adate'];
                }
                else{
                    echo "Ship ID or Arrival Date is not set.";
                }
                ?>
                <form action="updateship.php?sid=<?php echo $sid; ?>&adate=<?php echo $ardate; ?>" method="post">
                    <div class="mb-3">
                        <label for="adate" class="form-label">Change Arrival Date</label>
                        <input type="date" class="form-control" name="adate" id="adate">
                        </div>
                    <div class="mb-3">
                        <label for="ddate" class="form-label">Change Departure Date</label>
                        <input type="date" class="form-control" name="ddate" id="ddate">
                        </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Change Current Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="?">Called to dock</option>
							<option value="Ready">Ready to Load</option>
                            <option value="Checked">Checked</option>
                            <option value="Departed">Departed</option>
                            <option value="Disapproved">Disapproved</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    </div>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $adate= isset($_POST['adate']) ? $_POST['adate'] : null;
                    $ddate= isset($_POST['ddate']) ? $_POST['ddate'] : null;
                    $status = isset($_POST['status']) ? $_POST['status'] : null;
                        if($adate != null && $ddate != null && $status != null){
                            $sql="update ship set adate='$adate',ddate='$ddate',stat='$status' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else if($adate != null && $ddate != null ){
                            $sql="update ship set adate='$adate',ddate='$ddate' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else if($adate != null && $status != null){
                            $sql="update ship set adate='$adate',stat='$status' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else if($ddate != null && $status != null){
                            $sql="update ship set ddate='$ddate',stat='$status' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else if($adate != null){
                            $sql="update ship set adate='$adate' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else if($ddate != null){
                            $sql="update ship set ddate='$ddate' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else if($status != null){
                            $sql="update ship set stat='$status' where sid='$sid' and adate='$ardate'";
                            mysqli_query($con,$sql);
                            header("Location:view.php");
                        }
                        else{
                            echo "No fields changed";
                        }       
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

