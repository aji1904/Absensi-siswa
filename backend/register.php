<?php

include 'connect.php';

$user = $_POST['user'];
$password = password_hash(($_POST['password']), PASSWORD_DEFAULT );
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$status = $_POST['status'];

$cekUser = mysqli_query( $connect, "SELECT username FROM $status WHERE username = '$user' ");
$cekData = mysqli_num_rows($cekUser);
if ($cekData == 0) {
    $insert = mysqli_query( $connect, " INSERT INTO $status VALUES ('','$user','$password','$email','$telepon') ");
    if ($insert) {
	    $_SESSION['pesan'] = '<div class="alert alert-success text-center" role="alert">'.$user.' Sudah Dibuat</div>';
        header("Location: ../frontend/login.php");
        die();
    } else {
	    $_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Maaf '.$user.' Sudah Terdaftar</div>';
        header("Location: ../frontend/register.php");
        die();
    }
    
} else {
    $_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Maaf Username Sudah digunakan</div>';
    header("Location: ../frontend/register.php");
}

?>