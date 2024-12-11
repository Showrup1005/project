<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <header class="bg-primary py-3">
        <h1 class="text-center text-white">Welcome Admin</h1>
    </header>
       <div class="container my-5">
        <div class="c-1">
            <h3 class="text-center mt-3">Ship's Complains</h3>
            <br>
            <table class="table table-striped">
                <thead>
                    <th>Ship Name</th>
                    <th>Complaining Date</th>
                    <th>Complain</th>
                </thead>
                <tbody>
                    <?php
                     include("../connection.php");
                     $sql = "select * from complain";
                     $r=mysqli_query($con,$sql);
                     if(mysqli_num_rows($r)>0)
                     {
                        while($row=mysqli_fetch_array($r))
                        {
                            echo"
                                <tr>
                                <td>$row[sname]</td>
                                <td>$row[currentdate]</td>
                                <td>$row[problem]</td>
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
</body>
</html>