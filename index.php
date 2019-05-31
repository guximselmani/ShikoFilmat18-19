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
                <li><a href="rating.php">Vleresimi</a></li>
                <li><a href="contact.php">Kontakti</a></li>
            </ul>
        </div>
    </div>

    <div class="sitecontent">
        <div class="sidebarcontainer">
            <?php include "side.php"; ?>
                <div class="content">
                    <h1>Kinema</h1>
                    <div class="films">
                        <a href="#"><img src="assets/img/venom.png" width="150" height="200" ></a>
                        <a href="#"><img src="assets/img/Avengers.png" width="150" height="200" ></a>
                    </div>
                    <div class="serials">
                        <h1>Seriale</h1>
                        <a href="#"><img src="assets/img/breakingbad.png" alt=""></a>
                        <a href="#"><img src="assets/img/silicon.png" alt=""></a>
                        <a href="#"><img src="assets/img/dead.png" alt=""></a>
                        <a href="#"><img src="assets/img/xfilies.png" alt=""></a>
                    </div>
                    <div class="posts">
                        <hr>
                        <h2><a href="#">Si të xhironi një venë</a></h2>
                        <div class="postcontent">
                            <p>Në qershor të vitit 2017, presidenti i Marvel Studios Kevin Faigi konfirmoi që pasi që filmi ishte projekti i vetëm i Sony, Marvel nuk kishte plane për të shfaqur Venus në KVM. Megjithatë, producenti Amy Pascal njoftoi së shpejti se Sony ka ndërmend të bëjë ngjarjet në filmat e tyre në "të njëjtën botë" si në filmin "Spider-Man: Returning Home", duke i përshkruar ato si një "shtojcë" të kësaj bote. . Ajo tha se filmat e rinj do të ndërpresin njëra-tjetrën dhe se njeriu i merimangës holandeze mund të shfaqet në filma. [4] Riz Ahmed negocioi bashkimin me projektin në gusht.</p>

                        </div>
                        <p><a href="#">Lexoje</a></p>
                        <hr>
                        <h2><a href="#">Avengers: Fundi i Lojërave: Trailer i Parë dhe Tregimi i Filmit të shumëpritur</a></h2>
                        <div class="postcontent">
                            <p>Më 7 dhjetor, rimorkio e parë e filmit të gjatë të pritur "Avengers: The End of the Game" u lirua në rrjet. Sipas bixhozit, tregimi do të jetë mjaft i këndshëm. Ky është filmi i katërt ndonjëherë për superheronj Marvel, të cilët janë të bashkuar për t'i rezistuar villains dhe për të shpëtuar botën. Filmi bazohet në komike, prandaj komploti i saj është i paparashikueshëm dhe fantastik..</p>
                        </div>
                        <a href="#"><p>Lexoje</p></a>
                    </div>
                </div>
        </div>x`
		<div class="footer">
			<p>
				<a href="index.html">Ballina</a> |
				<a href="filma.php">Filma</a> |
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