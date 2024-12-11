<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currently Working Ship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="">
    <header class="bg-primary py-3">
        <h1 class="text-center text-white">Welcome Officer</h1>
    </header>
       <div class="container">
       <h3 class="text-center mt-3">Assigned Ship</h3>
       <table class="table mt-3">
        <thead>
            <th>Ship Name</th>
            <th>Ship ID</th>
            <th>Arrival Date</th>
            <th>Number of containers</th>
            <th>Verdict</th>
        </thead>
        <tbody>
            <?php
                include("../connection.php");
                $id=$_SESSION['user_id'];
                $sql="select sname from previous_ship_record where oid='$id' and reason='Checking'";
                $result = mysqli_query($con, $sql);
                echo "<form action='home.php' method='post'>";
                if (mysqli_num_rows($result)>0){
                    while($row1=mysqli_fetch_array($result)){
                        $_SESSION['sname']=$row1['sname'];
                        $sname=$_SESSION['sname'];
                        $query="select * from ship where name='$sname' and stat='Checking'";
                    $r=mysqli_query($con,$query);
                    }                 
                    if(mysqli_num_rows($r)>0)
                     {           
                        while($row=mysqli_fetch_array($r))
                        {
                            $_SESSION['ship_no']=$row['ship_no'];
                            echo "
                            <tr>
                               <td>$row[name]</td>
                               <td>$row[sid]</td>
                               <td>$row[adate]</td>
                               <td>$row[noc]</td>  
                               <td><input type='radio' id='option1' name='verdict' value='yes'>
                               <label for='option1'>Yes</label><br>
                               <input type='radio' id='option2' name='verdict' value='no'>
                               <label for='option2'>No</label></td>
                            </tr>
                            ";
                        }
                     }
                     else{
                            echo "<tr><td colspan='5' style='text-align: center';>No ship assigned yet</td></tr>";
                     } 
                   }
                else{
                    echo "<tr><td colspan='5' style='text-align: center';>No ship assigned yet</td></tr>";
                }       
            ?>
        </tbody>
        </table>
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
        </form>
        <?php
        include("../connection.php");
        if(isset($_POST["verdict"])){
            $verdict=$_POST['verdict'];
            $sname=$_SESSION['sname'];
            $ship_no=$_SESSION['ship_no'];
            $id=$_SESSION['user_id'];
            $currentDate=date("Y-m-d");
            if($verdict=="yes"){
                $reason='approved';
                $sql="update ship set stat='Checked' where name='$sname' and stat='Checking'";
                mysqli_query($con,$sql);
                $sql1="update secured set situation=1 where oid='$id'";
                mysqli_query($con,$sql1);  
                $sql3="update previous_ship_record set reason='$reason',currentdate='$currentdate' where sname='$sname' and ship_no='$ship_no'";
                mysqli_query($con,$sql3);      
                header("Location:prerecord.php");  
                exit();
            }
            else if($verdict=="no"){
                $sql="update ship set stat='Disapproved' where name='$sname' and stat='Checking'";
                mysqli_query($con,$sql);
                $sql1="update secured set situation=1 where oid='$id'";
                mysqli_query($con,$sql1);
                echo "<form action='home.php' method='post'>
                        <label for='comment'>Reason:</label><br>
                        <textarea id='comment' name='comment' rows='4' cols='50'></textarea><br>
                        <input type='submit' value='Submit' name='insert' class='btn btn-primary'>
                        </form>";
                exit();
            }
            else{
                echo "error!".mysqli_error($con);
            }         
        }
        ?>
        <?php
        include("../connection.php");
        if(isset($_POST['insert'])){
            $reason=$_POST['comment'];
            $sname=$_SESSION['sname'];
            $ship_no=$_SESSION['ship_no'];
            $currentDate=date("Y-m-d");
            $sql="update previous_ship_record set reason='$reason',currentdate='$currentdate' where sname='$sname' and ship_no='$ship_no'";
            if(mysqli_query($con,$sql)){
                header("Location:prerecord.php");
            }
            else{
                echo "Something happened";
            }
        }
        ?>
        </div>
    </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
