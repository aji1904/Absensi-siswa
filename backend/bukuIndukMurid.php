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
$namaAyah = $_POST['namaAyah'];
$handphoneAyah = $_POST['handphoneAyah'];
$namaIbu = $_POST['namaIbu'];
$handphoneIbu = $_POST['handphoneIbu'];
$tahunMasuk = $_POST['tahunMasuk'];

$Conn = mysqli_query($connect, 'SELECT * FROM buku_murid WHERE namaLengkap = "'.$namaLengkap.'" ');
$cekData = mysqli_num_rows($Conn);

if($cekData >= 1){
	$_SESSION['pesan'] = '<div class="alert alert-danger text-center" role="alert">Maaf Data Siswa '.$namaLengkap.' Sudah Terdaftar</div>';
	header("Location: ../frontend/bukuIndukMurid.php");
	die();
}

$file = (new File('../frontend/'))->setPath('fotoMurid/');
	$upload = $file->upload([$namaLengkap => $foto]);

	if($upload->success()){
		$pathImage = $upload->getSuccessPath();
		$foto_murid = mysqli_real_escape_string($connect, $pathImage[$namaLengkap]);
		$data_murid = "insert into buku_murid values ('','$foto_murid','$namaLengkap','$namaPanggilan','$alamat','$tempatLahir','$tanggalLahir','$namaAyah', '$handphoneAyah', '$namaIbu','$handphoneIbu', '$tahunMasuk')";
		$query = mysqli_query($connect, $data_murid);
		if ($query) {
			$_SESSION['pesan'] = '<div class="alert alert-success text-center" role="alert">Data berhasil Tersimpan</div>';
			header("Location: ../frontend/bukuIndukMurid.php");
			die();
		} else {
			$_SESSION['pesan'] = '<div class="alert alert-success text-center" role="alert">Maaf Data Tidak Tersimpan</div>';
			header("Location: ../frontend/bukuIndukMurid.php");			
			die();
		}
	}else {
		foreach ($upload->getErrors() as $error) {
			echo $error;
		}
		die();
    }
?>