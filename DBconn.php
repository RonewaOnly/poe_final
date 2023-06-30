<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database ='bookstore';
    session_start();
    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("Connection failed you fucked the connection");
    }
?>