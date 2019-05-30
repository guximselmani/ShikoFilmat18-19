<?php include_once "Connection.php"; ?>
<?php


if (isset($_POST['submit'])) {
    $name = $_POST['name_add'];
    $surname = $_POST['surname_add'];
    $password = $_POST['password_add'];
    $email = $_POST['email_add'];
    $birthday = $_POST['birthday_add'];

    $nameError = "";

    $connection = new DbConnection();

    $name = mysqli_real_escape_string($connection->getdbconnect(), $name);
    $surname = mysqli_real_escape_string($connection->getdbconnect(), $surname);
    $password = mysqli_real_escape_string($connection->getdbconnect(), $password);
    $email = mysqli_real_escape_string($connection->getdbconnect(), $email);
    $birthday = mysqli_real_escape_string($connection->getdbconnect(), $birthday);

    //VALIDIMI NE BAZE TE SHPREHJEVE TE RREGULLTA PER FUSHAT INPUT
    $emri = '/^[A-Za-z]{6,32}$/';
    $mbiemri = '/^[A-Za-z]{6,32}$/';
    $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
    $pasi = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/';

//    if (!preg_match($emri, $name) || !preg_match($mbiemri, $surname)) {
//        $nameError = "Only letters and white space allowed";
//    }
    if (empty($_POST["name"])) {
        $nameError = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
// check name only contains letters and whitespace
        if (!preg_match($emri,$name)) {
            $nameError = "Only letters and white space allowed";
        }else {
            if (!preg_match($regex, $email)) {
                echo "invalid email.<br>";
            } else {

                if (!preg_match($pasi, $password)) {
                    echo "Passwordi duhet te permbaje se paku nje shkronje dhe nje numer,minimum 8 karaktere<br>";
                } else {

                    if (!$connection) {
                        die('Is not connected' . mysqli_error());
                    } else {

                        $hashFormat = "$2y$10$";
                        $salt = "asdfghjklqwertyuiopzxc";
                        $hashF_and_salt = $hashFormat . $salt; //Encrypt password

                        $password = crypt($password, $hashF_and_salt);

                        $query = "INSERT INTO users (username, surname, password, email, birthday)";
                        $query .= "VALUES ('$name', '$surname', '$password', '$email', '$birthday');";

                        $result = mysqli_query($connection->getdbconnect(), $query);

                        var_dump($result);

                        if (!$result) {

                            die('Query FAILD' . mysqli_error());

                        } else {

                            $teksti = "Ti tani je user i ri !<br>";
                            $zevendesimi = preg_replace("/Ti/", "$name", $teksti); //PREG REPLACE
                            echo $zevendesimi;

                        }

                    }

                }

            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    ?>