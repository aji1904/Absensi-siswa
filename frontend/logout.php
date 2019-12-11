<?php
error_reporting(0);

include "../backend/connect.php";
if(isset($_SESSION['userData'])){
    unset($_SESSION['userData']);
}

header("Location: login.php");

?>