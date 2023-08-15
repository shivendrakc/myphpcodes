<?php
    define('host', 'localhost');
    define('username', 'root');
    define('password', '');
    define('name', 'login_form');
    $conn = new mysqli(host, username, password, name);
    //if (!$conn->connect_error){
      //  die("Connection error". $conn->connect_error);
    //}
?>