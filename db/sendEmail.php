<?php
//use PHPMailer\PHPMailer\PHPMailer;
require_once "../functions.php";

if (isset($_POST['email'])) {
    $conn = new mysqli('localhost', 'root', '', 'MenagjimiIFilmave');

    $email = $conn->real_escape_string($_POST['email']);

    $sql = $conn->query("SELECT id FROM users WHERE email='$email'");
    if ($sql->num_rows > 0) {

        $token = generateNewString();

        $conn->query("UPDATE users SET token='$token', 
                      tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                      WHERE email='$email'
            ");

        //require_once "../PHPMailer/PHPMailer.php";
        //require_once "../PHPMailer/Exception.php";

        require '../class/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "testprojektphp@gmail.com";
        $mail->Password = "Aaaa1234";
        $mail->setFrom('testprojektphp@gmail.com', 'Reset Password');
        $mail->addAddress($email, 'John Doe');
        $mail->Subject = "Reset Password";
        $mail->Body = "
	            Hi,

	            In order to reset your password, please click on the link below:
	            
	            http://localhost/ProjektiPHP/ShikoFilmat18-19/resetPassword.php?email=$email&token=$token

	            Kind Regards,
	            Filma Page
	        ";

        if ($mail->send())
            exit(json_encode(array("status" => 1, "msg" => 'Please Check Your Email Inbox!')));
        else
            exit(json_encode(array("status" => 0, "msg" => $mail->ErrorInfo)));
    } else
        exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Inputs!')));
}
?>