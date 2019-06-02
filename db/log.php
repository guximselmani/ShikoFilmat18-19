<?php

$myfile = fopen("login.txt", "r") or die("Unable to open file!");
if (!$myfile)
    echo fread($myfile,filesize("login.txt"));
else
    echo "Kemi 0 perdorues";
fclose($myfile);

?>