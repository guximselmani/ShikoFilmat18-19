<?php //include "db/login_update.php";
// include_once "Css/validation.php"; ?>
<?php



//$nameError ="";
$surnameError ="";
//$passwordError ="";
//$emailError ="";
//
    if (isset($_POST['submit'])) {

        //if (!isset($_POST["name_add"])) {
//        function validationName()
//        {
//        if (empty($_POST["name_add"])) {
//            throw new Exception("Shkruaj emrin");
//        } else {
//            $name = test_input($_POST["name_add"]);
//            $emri = '/^[A-Za-z]{3,32}$/';
//            if (!preg_match($emri, $name)) {
//                throw new Exception("Emri mund te permbaj 3-32 SHKRONJA");
//            }
//        }}
//        $nameError = "validationName";
//
        if (!isset($_POST["surname_add"])) {
            ($surnameError = "Shkruaj mbiemrin");
            header("Location: ../signup.php");
            return;
        } else {//PHP EXCEPTION,STRLEN
            try
            {
                if(strlen($mbiemri)>30)
                {
                    echo " ";
                }
                else
                {
                    throw new Exception('Mbimri duhet ti kete me pak se 30 shkronja');
                }
            }

            catch(Exception $er)
            {
                echo 'Error:'.$er->getMessage();
            }
            $surname = test_input($_POST["surname_add"]);
            $mbiemri = '/^[A-Za-z]{3,32}$/';
            if (!preg_match($mbiemri, $surname)) {
                $surnameError = "Emri mund te permbaj 3-32 SHKRONJA";
                header("Location: ../signup.php");
                return;
            }
        }
    }
//
//        if (empty($_POST["email_add"])) {
//            $emailError = "Te shkruhet Email";
//        } else {
//            $email = test_input($_POST["email_add"]);
//            $regex = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
//            if (!preg_match($regex, $email)) {
//                $emailError = "Formati jo sakte";
//            }
//        }
//
//        if (empty($_POST["password_add"])) {
//            $passwordError = "Te shkruhet fjalekalimi";
//        } else {
//            $password = test_input($_POST["password_add"]);
//            $pasi = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
//            if (!preg_match($pasi, $password)) {
//                $passwordError = "Passwordi duhet te permbaje nje shkronje nje numer,minimum 8 karaktere";
//            }
//        }
//        ?>
<!--        --><?php
//// Functions to filter user inputs
//        function filterName($field)
//        {
//            // Sanitize user name
//            $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
//
//            // Validate user name
//            if (filter_var($field, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
//                return $field;
//            } else {
//                return FALSE;
//            }
//        }
//
//        function filterEmail($field)
//        {
//            // Sanitize e-mail address
//            $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
//
//            // Validate e-mail address
//            if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
//                return $field;
//            } else {
//                return FALSE;
//            }
//        }
//
//        function filterString($field)
//        {
//            // Sanitize string
//            $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
//            if (!empty($field)) {
//                return $field;
//            } else {
//                return FALSE;
//            }
//        }
//
//// Define variables and initialize with empty values
//        $nameErr = $emailErr = $messageErr = "";
//        $name = $email = $subject = $message = "";
//
//// Processing form data when form is submitted
//        if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//            // Validate user name
//            if (empty($_POST["name"])) {
//                $nameErr = "Please enter your name.";
//            } else {
//                $name = filterName($_POST["name"]);
//                if ($name == FALSE) {
//                    $nameErr = "Please enter a valid name.";
//                }
//            }
//
//            // Validate email address
//            if (empty($_POST["email"])) {
//                $emailErr = "Please enter your email address.";
//            } else {
//                $email = filterEmail($_POST["email"]);
//                if ($email == FALSE) {
//                    $emailErr = "Please enter a valid email address.";
//                }
//            }
//
//            // Validate message subject
//            if (empty($_POST["subject"])) {
//                $subject = "";
//            } else {
//                $subject = filterString($_POST["subject"]);
//            }
//
//            // Validate user comment
//            if (empty($_POST["message"])) {
//                $messageErr = "Please enter your comment.";
//            } else {
//                $message = filterString($_POST["message"]);
//                if ($message == FALSE) {
//                    $messageErr = "Please enter a valid comment.";
//                }
//            }
//
//            // Check input errors before sending email
//            if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
//                // Recipient email address
//                $to = 'webmaster@example.com';
//
//                // Create email headers
//                $headers = 'From: ' . $email . "\r\n" .
//                    'Reply-To: ' . $email . "\r\n" .
//                    'X-Mailer: PHP/' . phpversion();
//
//                // Sending email
//                if (mail($to, $subject, $message, $headers)) {
//                    echo '<p class="success">Your message has been sent successfully!</p>';
//                } else {
//                    echo '<p class="error">Unable to send email. Please try again!</p>';
//                }
//            }
//        }
//    }
//
//function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a account </title>
    <link rel="stylesheet" href="CSS/resetPass.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div id="highlighted" class="hl-basic hidden-xs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
                <h1>Create Account</h1>
            </div>
        </div>
    </div>
</div>
<div id="content" class="interior-page">
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
            <div class="col-sm-3 col-md-3 col-lg-2 sidebar equal-height interior-page-nav hidden-xs">
                <div class="dynamicDiv panel-group" id="dd.0.1.0">
                    <div id="subMenu" class="panel panel-default">
                        <ul class="subMenuHighlight panel-heading">
                            <li class="subMenuHighlight panel-title" id="subMenuHighlight">
                                <a id="li_291" href="signup.php"><span class="subMenuHighlight">Register</span></a>
                            </li>
                        </ul>
                        <ul class="panel-heading">
                            <li class="panel-title">
                                <a class="subMenu1" class="subMenuHighlight" href="forgotPassword.php"><span>Forgot Password</span></a>
                            </li>
                        </ul>
                        <ul class="panel-heading">
                            <li class="panel-title">
                                <a class="subMenu1" href="index.php"><span>Login</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="item item-nopad item-noborder item-gold">
                        <a style="padding: 5% 0px;" href="" class="btn btn-primary btn-block" role="button">LEARN MORE</a>
                    </div>
                </div>
            </div>

            <!--Content-->
            <div class="col-sm-9 col-md-9 col-lg-10 content equal-height">
                <div class="content-area-right">
                    <div class="row">
                        <div class="col-md-5 register-form">
                            <p>Please enter your information below. It's nice to have you.</p>

                                First Name: <input id="name_add" name="name_add" class="form-control" type="text">
                                <span class="errorMessage" id="error_name"> </span><br>

                                Last Name: <input id="surname_add" name="surname_add" class="form-control" type="text">
                                <span class="errorMessage" id="error_surname"></span><br>

                                Email Address: <input id="email_add" name="email_add" class="form-control" type="text">
                                <span class="errorMessage" id="error_email"></span><br>

                                Password: <input id="password" name="password_add" class="form-control" type="password">
                                <span class="errorMessage" id="error_password"></span><br>

                                Birthday: <input id="birthday_add" name="birthday_add" class="form-control" type="date">
<!--                                <span class="errorMessage" id="error_birthday"></span><br>-->

                                <button id="submit" name="submit" class="btn btn-primary" role="button">Send</button>
                        </div>
                        <div class="col-md-5 forgot-return" style="display:none;">
                            <h2>Reset Password Sent</h2>
                            <p>An email has been sent to your address with a reset password you can use to access your account.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            var name_add = $("#name_add");
            var surname_add = $("#surname_add");
            var email_add = $("#email_add");
            var password = $("#password");
            var birthday_add = $("#birthday_add");

            $(document).ready(function () {
                $('#submit').on('click', function () {
                    //if (email.val() != "") {
                        //email.css('border', '1px solid green');

                        $.ajax({
                            url: 'db/login_update.php',
                            method: 'POST',
                            dataType: 'text',
                            data: {
                                name_add: name_add.val(),
                                surname_add: surname_add.val(),
                                email_add: email_add.val(),
                                password_add: password.val(),
                                birthday_add: birthday_add.val()
                            }, success: function (response) {
                                var responseData = JSON.parse(response);
                                console.log(responseData);
                                if(responseData.status == 1) {
                                    window.location = "index.php";
//                                    alert("test");
                                }
                                else {
                                    $("#" + responseData.id).text(responseData.msg);
//                                    alert(responseData.msg);
                                }
                                $("#response").html(response.msg).css('color', "green");

                            }
                        });
                });
            });
        </script>


</body>
</html>
