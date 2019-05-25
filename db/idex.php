<?php


    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = mysqli_connect('localhost', 'root','', 'MenagjimiIFilmave');

        $query = "SELECT * FROM users where username like '" . $username . "'";

        $result = mysqli_query($connection, $query);

        if ($result){
            echo "???";
        }
        else{
            die('Query FAILED' . mysqli_error($connection));
        }

    }

?>

