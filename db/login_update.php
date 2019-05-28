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

//VALIDIMI NE BAZE TE SHPREHJEVE TE RREGULLTA PER FUSHAT INPUT
    $emri   ='/^[A-Za-z]{6,32}$/';
    $mbiemri='/^[A-Za-z]{6,32}$/';
    $regex  ='/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
    $pasi ='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/';

    if (!preg_match( $emri,$name))
    {
        echo "Emri nuk mund te permbaje karaktere tjera pos shkronjave<br>";
    }


     if (!preg_match( $mbiemri,$surname))
    {
        echo "Mbiemri nuk mund te permbaje karaktere tjera pos shkronjave<br>";
    }


     if (!preg_match($regex,$email))
    {
    echo "invalid email.<br>";
    }

    if (!preg_match( $pasi,$password))
    {
        echo "Passwordi duhet te permbaje se paku nje shkronje dhe nje numer,minimum 8 karaktere<br>";
    }

	
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

         

         $teksti="Ti tani je user i ri !<br>";
         $zevendesimi=preg_replace("/Ti/","$name",$teksti);         //PREG REPLACE
         echo $zevendesimi;
     }


}

?>

