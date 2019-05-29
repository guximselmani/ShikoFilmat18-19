<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1/0">
    <title>Ballina</title>
    <meta name="desctiption" content="Website about movie">
    <meta name="keywords" content="films,serials,shows">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
</head>
<body>
<?php include 'db/idex.php';?>
<div class="main">

    <div class="header">
        <div class="logo">
            <div class="logotext">
                <h1><a href="/">Shiko filmat</a></h1>
                <h2>Filma dhe seriale!</h2>
            </div>
        </div>

        <div class="menubar">
            <ul class="menu">
                <li class="selected"><a href="#">Ballina</a></li>
                <li><a href="filma.php">Filma</a></li>
                <li><a href="#">Seriale</a></li>
                <li><a href="rating.html">Vleresimi</a></li>
                <li><a href="contact.html">Kontakti</a></li>
            </ul>
        </div>
    </div>

    <div class="sitecontent">

    <?php include "side.php"; ?>

		<div class="footer">
			<p>
				<a href="index.html">Ballina</a> |
				<a href="filma.html">Filma</a> |
				<a href="#">Seriale</a> |
				<a href="rating.html">Vleresimi</a> |
				<a href="contact.html">Kontakti</a> |
			</p>
		</div>

	</div>

</body>
<script>
    function logout() {
        $.ajax({
            url: 'db/logout.php',
            type: 'get',
            data:{action:'logout'},
            success: function(data){
//                console.log(data);
                location.reload();
            }
        });
    }
</script>
</html>