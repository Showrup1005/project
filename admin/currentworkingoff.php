<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Working Officer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <header class="py-3">
        <h1 class="text-center text-primary">Welcome Admin</h1>
    </header>
       <div class="container my-5">
            <h4 class="mt-3 text-center">Currently Working Officer</h4>
            <table class="table table-striped">
                <thead>
                    <th>Ship Name</th>
                    <th>Date Assigned</th>
                    <th>Officer ID</th>
                </thead>
                <tbody>
                    <?php
                     include("../connection.php");
                     $sql = "select * from previous_ship_record where reason='Checking'";
                     $r=mysqli_query($con,$sql);
                     if(mysqli_num_rows($r)>0)
                     {         
                        while($row=mysqli_fetch_array($r))
                        {
                            echo "
                            <tr>
                               <td>$row[sname]</td>
                               <td>$row[currentdate]</td>
                               <td>$row[oid]</td>
                            </tr>
                            ";
                        }
                     }
                     else
                     {
                         echo "<tr><td colspan='4'>No officers are working at this point</td></tr>";
                     }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
       </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

