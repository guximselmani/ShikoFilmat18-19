<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
    <meta name="desctiption" content="Website about movie">
    <meta name="keywords" content="films,serials,shows">
    <link rel="stylesheet" href="Css/style.css" type="text/css">
</head>
<body>

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
                <li><a href="index.php">Ballina</a></li>
                <li><a href="filma.php">Filma</a></li>
                <li><a href="#">Seriale</a></li>
                <li><a href="#">Vleresimi</a></li>
                <li class="selected"><a href="contact.php">Kontakti</a></li>
            </ul>
        </div>
    </div>

    <div class="sitecontent">



        <div class="sidebarcontainer">
            <?php include_once "side.php";?>
        <div class="content">
            <h1>Na kontakto</h1>
            <p>Dërgo komentin tuaja</p>
            <div class="send sendcontact">
                <form action="#" method="post" id="review">
                    <input type="text" placeholder="Emri" name="reviewname">
                    <input type="text" placeholder="Email" name="reviewname">
                    <textarea name="reviewtext"></textarea>
                    <input type="submit" value="Dërgo">
                </form>
            </div>
        </div>

    </div>
    <div class="footer">
        <p>
            <a href="index.html">Ballina</a> |
            <a href="films.html">Filma</a> |
            <a href="#">Seriale</a> |
            <a href="rating.html">Vleresimi</a> |
            <a href="contact.html">Kontakti</a> |
        </p>
    </div>

</div>

</body>
</html>
