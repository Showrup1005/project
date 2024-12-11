<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <header class="text-center">
            <h1 class="text-primary mb-4">Welcome Admin</h1>
        </header>
        <div class="c-1">
            <h3 class="text-center mt-3">Report from Personnels</h3>
            <br>
            <table class="table table-striped">
                <thead>
                    <th>Personnel ID</th>
                    <th>Description</th>
                    <th>Reporting Date</th>
                </thead>
                <tbody>
                <?php
                     include("../connection.php");
                     $sql = "select * from report order by seriel desc";
                     $r=mysqli_query($con,$sql);
                     if(mysqli_num_rows($r)>0)
                     {
                        while($row=mysqli_fetch_array($r))
                        {
                            echo"
                                <tr>
                                <td>$row[oid]
                                    $row[e_id]</td>
                                <td>$row[descript]</td>
                                <td>$row[currentdate]</td>
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
    <div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
