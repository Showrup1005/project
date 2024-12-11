<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Ship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/home.css">
</head>
<body>
    <div class="">
        <header class="bg-primary py-3">
            <h1 class="text-center text-white">Welcome Manager</h1>
        </header>
       <div class="container">
       <h3 class="text-center mt-3">Assigned Ship</h3>
       <table class="table mt-3">
        <thead>
            <th>Ship Name</th>
            <th>Ship ID</th>
            <th>Departure Date</th>
            <th>Number of containers</th>
            <th></th>
        </thead>
        <tbody>
            <?php
                include("../connection.php");
                $id=$_SESSION['user_id'];
                $sql="select * from ship_employee where e_id='$id' and task='pending'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0)
                {           
                    while($row1=mysqli_fetch_array($result))
                    {
                    $sname=$row1['sname'];
                    $ship_no=$row1['ship_no'];
                    $task=$row1['task'];
                    $query="select * from ship where name='$sname' and (stat='Loading' or stat='pending')";
                    $r=mysqli_query($con,$query);  
                    }             
                    if(mysqli_num_rows($r)>0)
                     {           
                        while($row=mysqli_fetch_array($r))
                        {
                            echo "
                            <tr>
                               <td>$row[name]</td>
                               <td>$row[sid]</td>
                               <td>$row[ddate]</td>
                               <td>$row[noc]</td>  
                               <td><form action='outgoing.php' method='post'>
                               <input type='hidden' name='sname' value='$sname'>
                               <input type='hidden' name='ship_no' value='$ship_no'>
                               <input type='hidden' name='task' value='$task'>
                               <input type='submit' class='btn btn-primary' value='Done' name='submit'>
                               </form></td>
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
        <?php
        include("../connection.php");
        if(isset($_POST["submit"])){
            $sname=$_POST['sname'];
            $id=$_SESSION['user_id'];
            $task=$_POST['task'];
            $ship_no=$_POST['ship_no'];
            $currentdate=date("Y-m-d");
            $sql3="select count(*) as total from ship_employee where 
            sname = '$sname' and ship_no = '$ship_no' and task= 'pending'";
            $result=mysqli_query($con,$sql3);
            $check=mysqli_fetch_assoc($result);
            if($check['total']>0){
                $sql4 = "select count(*) as total_pending from ship_employee where sname='$sname' and ship_no='$ship_no' and task='pending' AND e_id != '$id'";
                $result_pending = mysqli_query($con, $sql4);
                $check_pending = mysqli_fetch_assoc($result_pending);
                if ($check_pending['total_pending'] == 0) {
                    $query="update ship_employee set task='done',currentdate='$currentdate' where sname='$sname' and ship_no='$ship_no' and e_id='$id'";
                    mysqli_query($con,$query);
                    $sql="update ship set stat='Departed' where name='$sname'";
                    mysqli_query($con,$sql);
                    header("Location:prerecord.php");
                }
                else{
                    $query="update ship_employee set task='done',currentdate='$currentdate' where sname='$sname' and ship_no='$ship_no' and e_id='$id'";
                    mysqli_query($con,$query);
                    $sql="update ship set stat='pending' where name='$sname' and stat='Loading'";
                    mysqli_query($con,$sql);
                    header("Location:prerecord.php");
                }
            }
            $sql1="update employee set activity=1 where e_id='$id'";
            mysqli_query($con,$sql1);   
        }        
        
        ?>
        </div>
    </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
