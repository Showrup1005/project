<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/home.css">
</head>
<body>
<div class="main">
       <div class="container mt-5">      
            <div><h4 class="mt-5 text-center">Monthly Ships Record</h4></div>
            <table class="table table-striped">
                <thead>
                    <th>Ship Name</th>
                    <th>Ship ID</th>
                    <th>Departure Date</th>
                    <th>Number of Containers</th>
                </thead>
                <tbody>
                <?php
                include("../connection.php");
                if(isset($_POST['submit'])){
                    $adate = $_POST['startdate'];
                    $ddate = $_POST['enddate'];
                    $sql = "select name,sid,ddate,noc from ship where ddate between '$adate' and '$ddate'";
                    $r=mysqli_query($con,$sql);
                    if(mysqli_num_rows($r)>0)
                    {       
                        while ($row = mysqli_fetch_array($r)) {
                            echo "
                                <tr>
                                    <td>$row[name]</td>
                                    <td>$row[sid]</td>
                                    <td>$row[ddate]</td>
                                    <td>$row[noc]</td>  
                                </tr>
                            ";
                        }
                    }
                    else{
                        echo "<tr><td colspan='4'>No ships of that name</td></tr>";
                    }
                }
                else{
                    echo "error!".mysqli_error($con);
                }
                ?>
                </tbody>
            </table>
        </div>
       </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
