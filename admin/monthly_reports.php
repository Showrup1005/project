<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .heading {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header>
            <h1 class="text-primary text-center mb-0 py-2">Welcome Admin</h1>
        </header>
        <div class="row justify-content-center mt-3">      
            <div class="col-md-6">
                <div class="heading">
                    <h4>Report</h4>
                </div>
                <form method="post" action="report.php">
                    <div class="mb-3">
                        <label for="startdate" class="form-label">Start Date</label>
                        <input id="startdate" name="startdate" type="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="enddate" class="form-label">End Date</label>
                        <input id="enddate" name="enddate" type="date" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
