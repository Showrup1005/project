<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fire Officer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h4 class="text-center mb-4">Fire Officer</h4>
                <form action="fireoff.php" method="get">
                    <table class="table table-striped">
                        <thead>
                            <th>Officer Name</th>
                            <th>Officer ID</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <?php
                        include("../connection.php");
                        $sql="select oname,oid from secured";
                        $r=mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($r)) {
                            echo "
                            <tr>
                               <td>$row[oname]</td>
                               <td>$row[oid]</td>
                               <td>
                               <input type='submit' name='delete' value='Fire' class='btn btn-outline-primary'>                               
                               </td> 
                            </tr>
                            ";
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
