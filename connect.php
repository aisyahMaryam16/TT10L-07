<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'rocs';
    
    $connect = mysqli_connect($host, $user,
    $password, $database)
    or die('connection failed');
   // echo "connection success";
?>