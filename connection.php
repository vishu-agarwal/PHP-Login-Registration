<?php
    $server = "localhost:3307";
    $serverUser = "root";
    $serverPswd = "";
    $dbname = "q1loginreg";
    $con = new mysqli($server,$serverUser,"");
    $db = mysqli_select_db($con,$dbname);
?>