<?php


if (isset($_POST['send'])){
    $name = $_POST['name_add'];
    $password = $_POST['password_add'];
    $email =  $_POST['email_add'];
    $birthday = $_POST['birthday_add'];

    $connection = mysqli_connect('localhost', 'root','', 'MenagjimiIFilmave');

    if (!$connection){
        die('Is not connected' . mysqli_error());
    }
    else{
        echo "Connected";
    }

     $query = "INSERT INTO users(username, password, email, birthday) ";
    $query .= "VALUES ('$name', '$password', '$email', '$birthday')";

     $result = mysqli_query($connection,$query);

     var_dump($result);

     if (!$result){
         die('Query FAILD' . mysqli_error());
     }
     else
     {
         echo "goooood";
     }



}

?>

