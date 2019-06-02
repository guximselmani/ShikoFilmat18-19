<?php
session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profili i perdoruesit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <img src="<?php echo  $_SESSION['userData']['picture']['url']?>">
        </div>

        <div class="col-md-9">
            <table class="table table-hover table-bordered">
                <tbody>
                <tr>
                    <td>ID</td>
                    <td><?php echo $_SESSION['userData']['id']?></td>
                </tr>
                <tr>
                    <td>FIRST NAME</td>
                    <td><?php echo $_SESSION['userData']['first_name']?></td>
                </tr>
                <tr>
                    <td>LAST NAME</td>
                    <td><?php echo $_SESSION['userData']['last_name']?></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><?php echo $_SESSION['userData']['email']?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>