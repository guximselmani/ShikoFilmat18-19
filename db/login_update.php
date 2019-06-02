<?php include_once "Connection.php";
session_start();
$nameError ="";
$surnameError ="";
$passwordError ="";
$emailError ="";
$birthdayError ="";

//if (isset($_POST['submit'])) {


    if (empty($_POST["name_add"])) {
        $nameError = "Shkruaj emrin";
        exit(json_encode(array("status" => 2, "msg" => $nameError, 'id' => 'error_name')));
    }
    else{
        $name = test_input($_POST["name_add"]);
        $emri = '/^[A-Za-z]{3,32}$/';
        if (!preg_match($emri,$name)) {
            $nameError = "Emri mund te permbaj 3-32 SHKRONJA";
            exit(json_encode(array("status" => 2, "msg" => $nameError, 'id' => 'error_name')));
        }
    }

    if (empty($_POST["surname_add"])) {
        $surnameError = "Shkruaj mbiemrin";
        exit(json_encode(array("status" => 2, "msg" => $surnameError, 'id' => 'error_surname')));
    }
    else{
        $surname = test_input($_POST["surname_add"]);
        $mbiemri = '/^[A-Za-z]{3,32}$/';
        if (!preg_match($mbiemri,$surname)) {
            $surnameError = "Mbiemri mund te permbaj 3-32 SHKRONJA";
            exit(json_encode(array("status" => 2, "msg" => $surnameError, 'id' => 'error_surname')));
        }
    }

    if (empty($_POST["email_add"])) {
        $emailError = "Te shkruhet Email";
        exit(json_encode(array("status" => 2, "msg" => $emailError, 'id' => 'error_email')));
    }
    else {
        $email = test_input($_POST["email_add"]);
        $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
        if (!preg_match($regex,$email)) {
            $emailError = "Formati jo sakte";
            exit(json_encode(array("status" => 2, "msg" => $emailError, 'id' => 'error_email')));
        }
    }

    if (empty($_POST["password_add"])) {
        $passwordError= "Te shkruhet fjalekalimi";
        exit(json_encode(array("status" => 2, "msg" => $passwordError, 'id' => 'error_password')));
    }
    else {
        $password = test_input($_POST["password_add"]);
        $pasi= '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/';
        if (!preg_match($pasi,$password)) {
            $passwordError = "Passwordi duhet te permbaje nje shkronje nje numer,minimum 8 karaktere";
            exit(json_encode(array("status" => 2, "msg" => $passwordError, 'id' => 'error_password')));
        }
    }
//    if (empty($_POST["birthday_add"])) {
//        $passwordError= "Te shkruhet fjalekalimi";
//        exit(json_encode(array("status" => 2, "msg" => $birthdayError, 'id' => 'error_birthday')));
//    }


    $name = $_POST['name_add'];
    $surname = $_POST['surname_add'];
    $password = $_POST['password_add'];
    $email = $_POST['email_add'];
    $birthday = $_POST['birthday_add'];

    $connection = new MySQLConnect();

    $name = mysqli_real_escape_string($connection->getConnection(), $name);
    $surname = mysqli_real_escape_string($connection->getConnection(), $surname);
    $password = mysqli_real_escape_string($connection->getConnection(), $password);
    $email = mysqli_real_escape_string($connection->getConnection(), $email);
    $birthday = mysqli_real_escape_string($connection->getConnection(), $birthday);

    $hashFormat = "$2y$10$";
    $salt = "asdfghjklqwertyuiopzxc";
    $hashF_and_salt = $hashFormat . $salt; //Encrypt password

    $password = crypt($password, $hashF_and_salt);

    $query = "INSERT INTO users (firstname, lastname, password, email, birthday, saltedHashin) ";
    $query .= "VALUES ('$name', '$surname', '$password', '$email', '$birthday', '$hashF_and_salt');";


    if (!$connection) {
        die('Is not connected' . mysqli_error());
    } else {

        $result = mysqli_query($connection->getConnection(), $query);

        if ($result) {
            throw new Exception('Query FAILD' . mysqli_error($connection->getConnection()));
        } else {
            $_SESSION['login'] = "hide";
            $_SESSION['logout'] = "show";
//            header("Location: ../index.php");
            exit(json_encode(array("status" => 1, "msg" => "Success")));
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>