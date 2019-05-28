<?php


if (isset($_POST['submit'])){
    $name = $_POST['name_add'];
    $surname = $_POST['surname_add'];
    $password = $_POST['password_add'];
    $email =  $_POST['email_add'];
    $birthday = $_POST['birthday_add'];

    $connection = mysqli_connect('localhost', 'root','', 'MenagjimiIFilmave');

    $name = mysqli_real_escape_string($connection, $name);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);
    $birthday = mysqli_real_escape_string($connection, $birthday);


    if (!$connection){
        die('Is not connected' . mysqli_error());
    }
    else{
        echo "Connected";
    }

    $hashFormat = "$2y$10$";
    $salt = "asdfghjklqwertyuiopzxc";
    $hashF_and_salt = $hashFormat . $salt; //Encrypt password

    $password = crypt($password, $hashF_and_salt);

     $query = "INSERT INTO users(username, surname, password, email, birthday) ";
    $query .= "VALUES ('$name', '$surname', '$password', '$email', '$birthday')";

     $result = mysqli_query($connection,$query);

     var_dump($result);

     if (!$result){
         die('Query FAILD' . mysqli_error());
     }
     else
     {
         header('Location: ' . $_SERVER['HTTP_REFERER']);
         exit();
     }



}

?>

