<?php
require_once "Facebook/autoload.php";
$FB =new \Facebook\Facebook([
    'app_id' =>'2308634082527006',
    'app_secret' =>'2cd8642d61ee924e61d7ccdc1d8a4128',
    'default_graph_version'=>'v2.10'

]);
   $helper=$FB->getRedirectLoginHelper();
?>