<div class="sidebarcontainer">

    <div class="sidebar">
        <h2>Search</h2>
        <form action="#" method="post" id="searchform">
            <input type="search" name="searchfield" dirname="kerko" placeholder="Kërkesa juaj">
            <input class="btn" type="submit" class="btn" name="gjej" value="Gjej atë"><!-- bootstrap ketu -->
        </form>

    </div>


    <div class="sidebar <?php echo $_SESSION['login'];  ?>">
        <h2>Kyçu </h2>
        <form action="db/idex.php" method="post" id="login">
            <input type="text" name="username" placeholder="Email-i i juaj" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>">
            <input type="password" name="password" placeholder="Fjalkalimi juaj" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>">
            <div class="pasregtext">
                <input type="checkbox" name="remember" id="remember">
                <p>Remember me?</p>
            </div>
            <input type="submit" name="submit" class="btn" value="Kyçu">
            <div class="pasregtext">
                <span><a href="password.html"> Keni harruar fjalkalimin</a></span> | <span><a href="signup.html">Regjistrohu</a></span>
            </div>
        </form>
    </div>

    <div class="sidebar <?php if (!isset($_SESSION['logout'])) echo "hide"; else echo $_SESSION['logout']; ?>">
        <input onclick="logout()" name="logout" class="btn" value="Log Out">
    </div>

    <div class="sidebar">
        <h2>Me te rejat</h2>
        <span>11.12.2018</span>
        <p>Avengers:end game-soon in the cinema</p>
        <a href="#">Lexoje</a>
    </div>
    <div class="sidebar">
        <h2>Vleresimi</h2>
        <ul>
            <li><a href="#">Avengers</a><span class="ratingsidebar">9.9</span></li>
            <li><a href="#">On the drive</a><span class="ratingsidebar">8.0</span></li>
            <li><a href="#">Home alone</a><span class="ratingsidebar">7.8</span></li>
            <li><a href="show.html">Walking dead</a><span class="ratingsidebar">9.5</span></li>
        </ul>
    </div>
</div>
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

</div>