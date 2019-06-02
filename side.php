<?php
require_once "config.php";


$redirectURL="http://localhost/ShikoFilmat18-19/fb-callback.php";
$permissions=['email'];
$loginURL=$helper->getLoginUrl($redirectURL,$permissions);

?>

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
            <input type="button" onclick="window.location='<?php echo $loginURL ?>'" name="submit" class="btn" value="Login with FB">
            <div class="pasregtext">
                <span><a href="forgotPassword.php"> Keni harruar fjalkalimin</a></span> | <span><a href="signup.php">Regjistrohu</a></span>
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
