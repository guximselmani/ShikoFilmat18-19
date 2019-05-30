<?php

$nameError ="";
$surnameError ="";
$passwordError ="";
$emailError ="";

if (isset($_POST['submit'])) {


    if (empty($_POST["name_add"])) {
        $nameError = "Shkruaj emrin";
    }
    else{
        $name = test_input($_POST["name_add"]);
        $emri = '/^[A-Za-z]{3,32}$/';
        if (!preg_match($emri,$name)) {
            $nameError = "Emri mund te permbaj 3-32 SHKRONJA";
        }
    }

    if (empty($_POST["surname_add"])) {
        $surnameError = "Shkruaj mbiemrin";
    }
    else{
        $surname = test_input($_POST["surname_add"]);
        $mbiemri = '/^[A-Za-z]{3,32}$/';
        if (!preg_match($mbiemri,$surname)) {
            $surnameError = "Emri mund te permbaj 3-32 SHKRONJA";
        }
    }

    if (empty($_POST["email_add"])) {
        $emailError = "Te shkruhet Email";
    }
    else {
        $email = test_input($_POST["email_add"]);
        $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
        if (!preg_match($regex,$email)) {
            $emailError = "Formati jo sakte";
        }
    }

    if (empty($_POST["password_add"])) {
        $passwordError= "Te shkruhet fjalekalimi";
    }
    else {
        $password = test_input($_POST["password_add"]);
        $pasi= '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
        if (!preg_match($pasi,$password)) {
            $passwordError = "Passwordi duhet te permbaje nje shkronje nje numer,minimum 8 karaktere";
        }
    }

    $connection = mysqli_connect('localhost', 'root', '', 'MenagjimiIFilmave');

    $name = $_POST['name_add'];
    $surname = $_POST['surname_add'];
    $password = $_POST['password_add'];
    $email = $_POST['email_add'];
    $birthday = $_POST['birthday_add'];

    $name = mysqli_real_escape_string($connection, $name);
    $surname = mysqli_real_escape_string($connection, $surname);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);
    $birthday = mysqli_real_escape_string($connection, $birthday);


    $query = "INSERT INTO users (firstname, surname, password, email, birthday)";
    $query .= "VALUES ('$name', '$surname', '$password', '$email', '$birthday');";

    $hashFormat = "$2y$10$";
    $salt = "asdfghjklqwertyuiopzxc";
    $hashF_and_salt = $hashFormat . $salt; //Encrypt password

    $password = crypt($password, $hashF_and_salt);

    if (!$connection) {
        die('Is not connected' . mysqli_error());
    } else {

        $result = mysqli_query($connection, $query);

        var_dump($result);

        if (!$result) {

            die('Query FAILD' . mysqli_error());

        }
    /*VALIDIMI NE BAZE TE SHPREHJEVE TE RREGULLTA PER FUSHAT INPUT
    $emri = '/^[A-Za-z]{3,32}$/';
    $mbiemri = '/^[A-Za-z]{3,32}$/';
    $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
    $pasi = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/';

    if (!preg_match($emri, $name) || !preg_match($mbiemri, $surname)) {
        echo "Emri ose mbiemri nuk mund te permbajne karaktere tjera pos shkronjave<br>";
    } else {
        if (!preg_match($regex, $email)) {
            echo "invalid email.<br>";
        } else {

            if (!preg_match($pasi, $password)) {
                echo "Passwordi duhet te permbaje se paku nje shkronje dhe nje numer,minimum 8 karaktere<br>";
            } else {


                    else {

                        $teksti = "Ti tani je user i ri !<br>";
                        $zevendesimi = preg_replace("/Ti/", "$name", $teksti); //PREG REPLACE
                        echo $zevendesimi;

                    }*/

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>