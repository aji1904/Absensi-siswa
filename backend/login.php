<?php  
include 'connect.php';

if (!isset($_POST['login'])) {
	header("Location: ../frontend/login.php");
	die();
}

$status = $_POST['status'];
$username = $_POST['username'];
$pass = $_POST['password'];
$select = "SELECT * FROM $status WHERE username= '$username' ";
$selectData = mysqli_query($connect, $select);


if ($selectData -> num_rows > 0) {
	$data = mysqli_fetch_array($selectData);
	$cekPassword = password_verify($pass, $data['password']);
	if ($cekPassword) {
		$_SESSION['status'] = $status;
		$_SESSION['userData'] =  $data;
		header('Location: ../frontend/');
		die();
	}else{
		$_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Password anda salah</div>';
	}
}else{
	$_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Username Belum Terdaftar Sebagai '.$status.'</div>';
}

header('Location: login.php');

?>

