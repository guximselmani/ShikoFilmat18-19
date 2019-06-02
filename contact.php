<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["submit"]))
{
    if(empty($_POST["name"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
        $name = clean_text($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if(empty($_POST["email"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    }
    else
    {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    if(empty($_POST["subject"]))
    {
        $error .= '<p><label class="text-danger">Subject is required</label></p>';
    }
    else
    {
        $subject = clean_text($_POST["subject"]);
    }
    if(empty($_POST["message"]))
    {
        $error .= '<p><label class="text-danger">Message is required</label></p>';
    }
    else
    {
        $message = clean_text($_POST["message"]);
    }
    if($error == '')
    {
        require 'class/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();        //Sets Mailer to send message using SMTP
        //$mail->SMTPDebug = 1;
        $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
        $mail->Port = 587;        //Sets the default SMTP server port
        $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'testprojektphp@gmail.com';     //Sets SMTP username
        $mail->Password = 'Aaaa1234';     //Sets SMTP password
        $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = $_POST["email"];     //Sets the From email address for the message
        $mail->FromName = $_POST["name"];    //Sets the From name of the message
        $mail->AddAddress('testprojektphp@gmail.com', 'Name');//Adds a "To" address
        $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);       //Sets message type to HTML
        $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
        $mail->Body = $_POST["message"];    //An HTML or plain text message body
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
            $error = '<label class="text-success">Thank you for contacting us</label>';
        }
        else
        {
            $error = '<label class="text-danger">There is an Error' . $mail->ErrorInfo . '</label>';
        }
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
    <meta name="desctiption" content="Website about movie">
    <meta name="keywords" content="films,serials,shows">
    <link rel="stylesheet" href="Css/style.css" type="text/css">
</head>
<body>

<div class="main">

    <div class="header">
        <div class="logo">
            <div class="logotext">
                <h1><a href="/">Shiko filmat</a></h1>
                <h2>Filma dhe seriale!</h2>
            </div>
        </div>

        <div class="menubar">
            <ul class="menu">
                <li><a href="index.php">Ballina</a></li>
                <li><a href="filma.php">Filma</a></li>
                <li><a href="#">Seriale</a></li>
                <li><a href="#">Vleresimi</a></li>
                <li class="selected"><a href="contact.php">Kontakti</a></li>
            </ul>
        </div>
    </div>

    <div class="sitecontent">

        <div class="sidebarcontainer">
            <?php include_once "side.php";?>
            <div class="row">
                <div class="col-md-8" style="margin:0 auto; float:none;">
                    <h1>Na kontakto</h1>
                    <p>Dërgo komentin tuaja</p>
                            <div class="send sendcontact">
                                <form action="#" method="post" id="review">
                                    <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
                                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
                                    <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-info" />
                                </form>
                        </div>
                    </div>

</div>
    </div>

</body>
</html>
