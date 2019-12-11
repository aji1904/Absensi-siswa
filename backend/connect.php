<?php

session_start();
$hostname = "localhost";
$user = "root";
$password = "";
$database = "semut";

$connect = mysqli_connect($hostname,$user,$password,$database);

?>