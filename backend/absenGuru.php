<?php
include 'connect.php';

if(!isset($_POST['absenGuru'])){
    header("Location: ../frontend/absensiGuru.php");
    die();
}
$namalengkap = $_POST['nama']; 
$ket = $_POST['ket'];
$status = $_POST['statusGuru'];
$tanggal = $_POST['tanggalHadir'];
$kelas = $_POST['kelasGuru'];
$jumlah_hadir = count($namalengkap);

for($i = 0; $i < $jumlah_hadir; $i++){
    $insert = mysqli_query($connect,  "INSERT INTO absen_guru VALUES ('','$namalengkap[$i]', '$ket[$i]', '$status[$i]','$tanggal','$kelas[$i]') ");
}


if ($insert) {
    $_SESSION['absenGuru'] = '<div class="alert alert-success text-center" role="alert">Guru Sudah Selesai di Absen</div>';
    header("Location: ../frontend/absensiGuru.php");
    die();
}else{
    $_SESSION['absenGuru'] = '<div class="alert alert-danger text-center" role="alert">Guru Gagal di Absen</div>';
    header("Location: ../frontend/absensiGuru.php");
    die();
}
?>