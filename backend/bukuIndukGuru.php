<?php
include "connect.php";

if(!isset($_POST['simpan'])){
    header("Location: ../");
    die();
}
spl_autoload_register(function($module){
    $packagePath = __DIR__.'/packages/';
    $notPackages = ['.', '..'];
    $packages = array_diff(scandir($packagePath), $notPackages);
    foreach ($packages as $package) {
      $modulePath = $packagePath.$package;
      if (is_dir($modulePath)) $file = "{$modulePath}/{$module}.php";
      else $file = "{$packagePath}/{$module}.php";
      if (file_exists($file)) { require_once($file); break; }
    }
});

$foto = $_FILES['foto'];
$namaLengkap = $_POST['namaLengkap'];
$namaPanggilan = $_POST['namaPanggilan'];
$alamat = $_POST['alamat'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$noHandphone = $_POST['noHandphone'];
$tahunMasuk = $_POST['tahunMasuk'];
$status = $_POST['status'];

$Conn = mysqli_query($connect,'SELECT * FROM buku_guru WHERE namaLengkap = "'.$namaLengkap.'" ');
$cekData = mysqli_num_rows($Conn);

if($cekData >= 1){
	$_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Maaf Data Guru '.$namaLengkap.' Sudah Terdaftar</div>';
	header("Location: ../frontend/bukuIndukGuru.php");
	die();
}

$file = (new File('../frontend/'))->setPath('fotoGuru/');
	$upload = $file->upload([$namaLengkap => $foto]);

	if($upload->success()){
		$pathImage = $upload->getSuccessPath();
		$foto_guru = mysqli_real_escape_string($connect, $pathImage[$namaLengkap]);
		$data_guru = "insert into buku_guru values ('','$foto_guru','$namaLengkap','$namaPanggilan','$alamat','$tempatLahir','$tanggalLahir','$noHandphone', '$tahunMasuk','$status')";
		$query = mysqli_query($connect, $data_guru);
		if ($query) {
			$_SESSION['pesan'] = '<div class="alert alert-success text-center" role="alert">Data Berhasil Tersimpan</div>';
			header("Location: ../frontend/bukuIndukGuru.php");
			die();
		} else {
			$_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Maaf Data Tidak Tersimpan</div>';
			header("Location: ../frontend/bukuIndukGuru.php");
			die();
		}
	}else {
		foreach ($upload->getErrors() as $error) {
			echo $error;
		}
		die();
    }
?>