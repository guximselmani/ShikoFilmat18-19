<?php include_once "Connection.php"; ?>
<?php
session_start();
$nameError ="";
$surnameError ="";
$passwordError ="";
$emailError ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($_POST["name_add"])) {
    $nameError = "Shkruaj emrin";
//        header("Location: ../signup.php");
    header("Location: ../signup.php");
}
else{
    $name = test_input($_POST["name_add"]);
    $emri = '/^[A-Za-z]{3,32}$/';
    if (!preg_match($emri,$name)) {
        $nameError = "Emri mund te permbaj 3-32 SHKRONJA";
//            header("Location: ../signup.php");
    }
    header("Location: ../signup.php");
}

if (empty($_POST["surname_add"])) {
    $surnameError = "Shkruaj mbiemrin";
//        header("Location: ../signup.php");
}
else{
    $surname = test_input($_POST["surname_add"]);
    $mbiemri = '/^[A-Za-z]{3,32}$/';
    if (!preg_match($mbiemri,$surname)) {
        $surnameError = "Mbiemri mund te permbaj 3-32 SHKRONJA";
//            header("Location: ../signup.php");
    }
}

if (empty($_POST["email_add"])) {
    $emailError = "Te shkruhet Email";
//        header("Location: ../signup.php");
}
else {
    $email = test_input($_POST["email_add"]);
    $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
    if (!preg_match($regex,$email)) {
        $emailError = "Formati jo sakte";
//            header("Location: ../signup.php");
    }
}

if (empty($_POST["password_add"])) {
    $passwordError= "Te shkruhet fjalekalimi";
//        header("Location: ../signup.php");
}
else {
    $password = test_input($_POST["password_add"]);
    $pasi= '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
    if (!preg_match($pasi,$password)) {
        $passwordError = "Passwordi duhet te permbaje nje shkronje nje numer,minimum 8 karaktere";
//            header("Location: ../signup.php");
    }
}}

if (isset($_POST['submit'])) {


//    if (empty($_POST["name_add"])) {
//        $nameError = "Shkruaj emrin";
////        header("Location: ../signup.php");
//        header("Location: ../signup.php");
//    }
//    else{
//        $name = test_input($_POST["name_add"]);
//        $emri = '/^[A-Za-z]{3,32}$/';
//        if (!preg_match($emri,$name)) {
//            $nameError = "Emri mund te permbaj 3-32 SHKRONJA";
////            header("Location: ../signup.php");
//        }
//        header("Location: ../signup.php");
//    }
//
//    if (empty($_POST["surname_add"])) {
//        $surnameError = "Shkruaj mbiemrin";
////        header("Location: ../signup.php");
//    }
//    else{
//        $surname = test_input($_POST["surname_add"]);
//        $mbiemri = '/^[A-Za-z]{3,32}$/';
//        if (!preg_match($mbiemri,$surname)) {
//            $surnameError = "Mbiemri mund te permbaj 3-32 SHKRONJA";
////            header("Location: ../signup.php");
//        }
//    }
//
//    if (empty($_POST["email_add"])) {
//        $emailError = "Te shkruhet Email";
////        header("Location: ../signup.php");
//    }
//    else {
//        $email = test_input($_POST["email_add"]);
//        $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
//        if (!preg_match($regex,$email)) {
//            $emailError = "Formati jo sakte";
////            header("Location: ../signup.php");
//        }
//    }
//
//    if (empty($_POST["password_add"])) {
//        $passwordError= "Te shkruhet fjalekalimi";
////        header("Location: ../signup.php");
//    }
//    else {
//        $password = test_input($_POST["password_add"]);
//        $pasi= '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
//        if (!preg_match($pasi,$password)) {
//            $passwordError = "Passwordi duhet te permbaje nje shkronje nje numer,minimum 8 karaktere";
////            header("Location: ../signup.php");
//        }
//    }



    $name = $_POST['name_add'];
    $surname = $_POST['surname_add'];
    $password = $_POST['password_add'];
    $email = $_POST['email_add'];
    $birthday = $_POST['birthday_add'];

    $connection = new DbConnection();

    $name = mysqli_real_escape_string($connection->getdbconnect(), $name);
    $surname = mysqli_real_escape_string($connection->getdbconnect(), $surname);
    $password = mysqli_real_escape_string($connection->getdbconnect(), $password);
    $email = mysqli_real_escape_string($connection->getdbconnect(), $email);
    $birthday = mysqli_real_escape_string($connection->getdbconnect(), $birthday);

    $hashFormat = "$2y$10$";
    $salt = "asdfghjklqwertyuiopzxc";
    $hashF_and_salt = $hashFormat . $salt; //Encrypt password

    $password = crypt($password, $hashF_and_salt);

    $query = "INSERT INTO users (firstname, lastname, password, email, birthday) ";
    $query .= "VALUES ('$name', '$surname', '$password', '$email', '$birthday');";


    if (!$connection) {
        die('Is not connected' . mysqli_error());
    } else {

        $result = mysqli_query($connection->getdbconnect(), $query);

        var_dump($result);

        if (!$result) {

            die('Query FAILD' . mysqli_error());

        }else{
            $_SESSION['login'] = "hide";
            $_SESSION['logout'] = "show";
            header("Location: ../index.php");
            exit();
        }
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