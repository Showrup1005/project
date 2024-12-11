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
        <div class="row">
            <div class="col">
                <h3 class="text-center mt-3">Ship's Information</h3>
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ship Name</th>
                            <th>Ship ID</th>
                            <th>Arrival Date</th>
                            <th>Departure Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("connection.php");
                        if(isset($_GET['insert'])){
                            $srch=$_GET['srch'];
                            $sql = "select * from ship where name like '$srch%' order by adate";
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
                                    </tr>
                                    ";
                                }
                            }
                            else{
                                echo "<tr><td colspan='4'>No ships of that name</td></tr>";
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='4'>Error! ".mysqli_error($con)."</td></tr>";
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