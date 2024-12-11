<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="officers.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center my-5">Status of
        <?php
        include("../connection.php");
        if(isset($_GET['selected_officer'])) {
            $selectedOfficer = $_GET['selected_officer'];
            echo $selectedOfficer;
        } else {
            echo "No officer selected.";
        }
        ?></h3>
        <form action="" method="post" class="row g-3">
            <div class="custom-select-wrapper">         
                    <select name="sname" id="sname" class="custom-select form-select">
                    <?php
                        include("../connection.php");
                        $sql="select name from ship where stat='?'";
                        $r=mysqli_query($con,$sql);
                        if(mysqli_num_rows($r)>0)
                        {                      
                            while($row=mysqli_fetch_array($r))
                            {
                                $name=$row['name'];
                                echo "<option value='$name'>$name</option>";
                            }
                        }
                        else
                            {
                                echo "error!".mysqli_error($con);
                            }
                    ?>
                </select>
             </div>
            <div class="c-12 d-flex justify-content-center">
                <input type="submit" value="Assign" name="submit" class="btn btn-primary ">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php
include("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedOfficer = isset($_GET['selected_officer']) ? $_GET['selected_officer'] : '';
    $sname=$_POST["sname"];
    $currentDate=date("Y-m-d");
    $sql1="select ship_no from ship where name='$sname' and stat='?'";
    $r=mysqli_query($con,$sql1);
    if($r){
        if(mysqli_num_rows($r)>0) {           
            $row=mysqli_fetch_array($r);
            $ship_no=$row['ship_no'];
        }
        $sql2="select oid from secured where oname='$selectedOfficer'";
        $r1=mysqli_query($con,$sql2);
        if($r1){
            if(mysqli_num_rows($r1)>0) {           
                $row1=mysqli_fetch_array($r1);
                $oid=$row1['oid'];
            }
            $query="UPDATE ship SET stat='Checking' where name='$sname' and stat='?'";
            if (mysqli_query($con, $query)){
                $updateOfficerQuery="UPDATE secured set situation=0 WHERE oname='$selectedOfficer'"; 
                if (mysqli_query($con, $updateOfficerQuery)){
                    $reason='Checking';
                    $insertquery="insert into previous_ship_record (sname,ship_no,oid,reason,currentdate) values('$sname',$ship_no,'$oid','$reason','$currentDate')";
                    mysqli_query($con,$insertquery);
                    header("Location:security.php");
                } else {
                    echo "<p class='error-message'>Error updating officer situation: " . mysqli_error($con) . "</p>";
                }
            } else {
                echo "<p class='error-message'>Error updating ship status: " . mysqli_error($con) . "</p>";
            }
        }
    }
    else{
        echo "error!".mysqli_error($con);
    }
}
?>
