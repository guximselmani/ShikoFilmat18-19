<?php
Class DbConnection{
    function getdbconnect(){
        $connection = mysqli_connect("localhost","root","","MenagjimiIFilmave") or die("Couldn't connect");

        return $connection;
    }
}
?>