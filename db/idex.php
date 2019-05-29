<?php

    session_start();
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = mysqli_connect('localhost', 'root','', 'MenagjimiIFilmave');

        $username = mysqli_real_escape_string($connection, $username); /* SQL Injection*/
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users where username like '" . $username . "' or email like '" . $username . "'";

        $result = mysqli_query($connection, $query);

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

