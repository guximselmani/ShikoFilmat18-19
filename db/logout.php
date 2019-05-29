<?php
session_start();

if(isset($_GET['action']) && $_GET['action'] == "logout" ){
    $_SESSION['login'] = "show";
    $_SESSION['logout'] = "hide";
    exit();
}
?>