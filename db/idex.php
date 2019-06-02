<?php include_once "Connection.php"; ?>
<?php
    session_start();
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = new MySQLConnect();

        $username = mysqli_real_escape_string($connection->getConnection(), $username); /* SQL Injection*/
        $password = mysqli_real_escape_string($connection->getConnection(), $password);

        $hashFormat = "$2y$10$";
        $salt = "asdfghjklqwertyuiopzxc";
        $hashF_and_salt = $hashFormat . $salt; //Encrypt password

        if (password_verify($password, $hashF_and_salt)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }

        $query = "SELECT * FROM users where email like '" . $username . "' and password = '" . $password . "'";

        $result = mysqli_query($connection->getConnection(), $query);

        if (!$result){
            if ($_POST['remember'] == "on") {
                setcookie('username', $username, time() + (3600 * 24 * 7), "/");
                setcookie('password', $password, time() + (360 * 24 * 7), "/");
            } else  {
                setcookie('username', '', time() + (3600 * 24 * 7), "/");
                setcookie('password', '', time() + (3600 * 24 * 7), "/");
            }
            if ($_POST['submit']){
                $file = fopen("login.txt", "w+") or die("Unable to open file!");
                $text = $username . " eshte kycur ne oren " . time();

                fwrite($file,$text);
                fclose($file);


                $_SESSION['login'] = "hide";
                $_SESSION['logout'] = "show";
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        else{
            var_dump($query);
            die('Query FAILED' . mysqli_error($connection->getConnection()));
        }

    }

?>

