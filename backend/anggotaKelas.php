<?php

include "connect.php";
if(!isset($_POST['anggotaKelas'])){
    header("Location: ../");
    die();
}

$tahun = $_POST['tahun'];
$namaLengkap = $_POST['namaLengkap'];
$class = $_POST['kelas'];

$Conn = mysqli_query($connect,'SELECT * FROM anggota_kelas WHERE namaLengkap = "'.$namaLengkap.'" AND kelas = "'.$class.'" AND tahun = "'.$tahun.'"');
$cekData = mysqli_num_rows($Conn);

if($cekData >= 1){
	$_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Maaf Data '.$namaLengkap.' Kelas '.$class.' Sudah Ada</div>';
	header("Location: ../frontend/anggotaKelas.php");
	die();
}

$insert = mysqli_query($connect, "INSERT INTO anggota_kelas VALUES ('','$namaLengkap','$class','$tahun')");
if ($insert) {
    $_SESSION['pesan'] = '<div class="alert alert-success text-center" role="alert">Data berhasil Tersimpan</div>';
    header("Location: ../frontend/anggotaKelas.php");
    die();
} else {
    $_SESSION['pesan'] =  '<div class="alert alert-danger text-center" role="alert">Maaf Data Tidak Tersimpan</div>';
    header("Location: ../frontend/anggotaKelas.php");
    die();
}


?>