<?php include_once "Connection.php"; ?>
<?php
    session_start();
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = new DbConnection();

        $username = mysqli_real_escape_string($connection->getdbconnect(), $username); /* SQL Injection*/
        $password = mysqli_real_escape_string($connection->getdbconnect(), $password);

        $query = "SELECT * FROM users where email like '" . $username . "' and password like '" . $password . "'";

        $result = mysqli_query($connection->getdbconnect(), $query);

        if ($result){
            if ($_POST['remember'] == "on") {
                setcookie('username', $username, time() + (3600 * 24 * 7), "/");
                setcookie('password', $password, time() + (360 * 24 * 7), "/");
            } else  {
                setcookie('username', '', time() + (3600 * 24 * 7), "/");
                setcookie('password', '', time() + (3600 * 24 * 7), "/");
            }
            if ($_POST['submit']){
                $_SESSION['login'] = "hide";
                $_SESSION['logout'] = "show";
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        else{
            die('Query FAILED' . mysqli_error($connection));
        }

    }

?>

