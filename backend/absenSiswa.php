<?php
include 'connect.php';

if(!isset($_POST['absenSiswa'])){
    header("Location: ../frontend/absensiSiswa.php");
    die();
}
$namalengkap = $_POST['nama'];
$ket = $_POST['ket'];
$tanggal = $_POST['tanggal'];
$kelas = $_POST['kelas'];
$jumlah_hadir = count($ket);

for($i = 0; $i < $jumlah_hadir; $i++){
    $insert = mysqli_query($connect, "INSERT INTO absen_siswa VALUES ('','$namalengkap[$i]', '$ket[$i]', '$tanggal','$kelas[$i]') ");
}


if ($insert) {
    $_SESSION['absenSiswa'] = '<div class="alert alert-success text-center" role="alert">Siswa Sudah Selesai di Absen</div>';
    header("Location: ../frontend/absensiSiswa.php");
    die();
}else{
    $_SESSION['absenSiswa'] = '<div class="alert alert-danger text-center" role="alert">Siswa Gagal di Absen</div>';
    header("Location: ../frontend/absensiSiswa.php");
    die();
}
?>