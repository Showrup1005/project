<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .main {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="main">
        <header>
            <h1 class="text-primary text-center mb-0 py-2">Welcome Admin</h1>
        </header>
       <div class="container mt-3">      
            <div><h4 class="mt-4 text-center">Requesting Ships</h4></div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ship Name</th>
                            <th>Ship ID</th>
                            <th>Calling Date</th>
                            <th>Departure Date</th>
                            <th>Number of Containers</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         include("../connection.php");
                         $status = '?';
                         $sql = "select * from ship where stat='$status'";
                         $r=mysqli_query($con,$sql);
                         if(mysqli_num_rows($r)>0)
                         {       
                            while ($row = mysqli_fetch_array($r)) {
                                echo "
                                    <tr>
                                        <td>$row[name]</td>
                                        <td>$row[sid]</td>
                                        <td>$row[adate]</td>
                                        <td>$row[ddate]</td>
                                        <td>$row[noc]</td>   
                                    </tr>
                                ";
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
