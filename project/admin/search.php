<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
        <div class="c-1">
            <h3 class="text-center mt-3">Ship's Information</h3>
            <br>
            <table class="table table-striped">
                <thead>
                    <th>Ship Name</th>
                    <th>Ship ID</th>
                    <th>Calling Date</th>
                    <th>Departure Date</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <?php
                     include("../connection.php");
                     if(isset($_GET['insert'])){
                        $option=$_GET['options'];
                        $sql = "select * from ship where stat='$option' order by adate";
                        $r=mysqli_query($con,$sql);
                        if(mysqli_num_rows($r)>0)
                        {             
                           while($row=mysqli_fetch_array($r))
                           {
                               echo "
                               <tr>
                                  <td>$row[name]</td>
                                  <td>$row[sid]</td>
                                  <td>$row[adate]</td>
                                  <td>$row[ddate]</td>
                                  <td>$row[stat]</td>
                               </tr>
                               ";
                           }
                        }
                        else
                        {
                            echo "<tr><td colspan='5' style='text-align: center';>No ships of that criteria</td></tr>";
                        }
                     }
                     else
                        {
                            echo "error!".mysqli_error($con);
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
