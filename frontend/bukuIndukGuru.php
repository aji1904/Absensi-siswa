<?php 
error_reporting(0);

include "../backend/connect.php";
include "component/header.php"; 
if(!isset($_SESSION['userData'])){
    header("Location: login.php");
    die();
}
?>

<body class="animsition">

    <div class="page-wrapper">

        <!-- SIDEBAR -->
        <?php include "component/sidebar.php" ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">

        <!-- HEADER DESKTOP -->
        <?php include "component/headerDesktop.php"?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="row p-3">
                    <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Input Data</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Buku Induk Guru</h3>
                            </div>
                            <hr>
                            <?php
                                if (isset($_SESSION['pesan'])) {
                                    echo $_SESSION['pesan'];
                                    unset ($_SESSION['pesan']);
                                }
                            ?>
                            <form action="../backend/bukuIndukGuru.php" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12 pb-3" align="center">
                                    <div class="mx-auto">
                                        <img id="preview" src="component/images/noImages.png" style="height: 200px; width: auto;"/>
                                    </div>
                                    <div class="mt-3">
                                        <a class="btn btn-danger" href="#" onclick="javascript:removeImage();">Remove</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="upload" class="control-label mb-1">Upload Foto</label>
                                    <input id="upload" name="foto" type="file" accept="image/*" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="control-label mb-1">Nama Lengkap</label>
                                    <input id="nama" name="namaLengkap" type="text" class="form-control" placeholder="Example: Mike Joshua" required>
                                </div>
                                <div class="form-group">
                                    <label for="nick" class="control-label mb-1">Nama panggilan</label>
                                    <input id="nick" name="namaPanggilan" type="text" class="form-control" placeholder="Example: Mike" required>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Alamat</label>
                                    <input id="address" name="alamat" type="text" class="form-control" placeholder="Example: Jalan Kebun Bunga" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label for="place" class="control-label mb-1">Tempat Lahir</label>
                                        <input id="place" name="tempatLahir" type="text" class="form-control" placeholder="Example : Palembang" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="lahir" class="control-label mb-1">Tanggal Lahir</label>
                                        <input id="lahir" name="tanggalLahir" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="handphone" class="control-label mb-1">No Handphone</label>
                                    <input id="handphone" name="noHandphone" type="tel" class="form-control" placeholder="Example: 08932131231" required>
                                </div>
                                <div class="form-group">
                                    <label for="tahunMasuk" class="control-label mb-1">Tahun Masuk Sekolah Minggu</label>
                                    <input id="tahunMasuk" name="tahunMasuk" type="text" class="form-control" placeholder="Example: 2013" required>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status Guru</label>
                                    <select name="status" class="form-control-lg form-control" required>
                                        <option value="">Please select</option>
                                        <option value="Sekolah Minggu">Sekolah Minggu</option>
                                        <option value="BC">BC</option>
                                        <option value="Ibadah">Ibadah</option>
                                    </select>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-6 pb-3">
                                        <button name="simpan" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fas fa-save"></i>&nbsp;
                                            <span>Simpan</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <a href="#" onclick="javascript:erase();" class="btn btn-lg btn-info btn-block">
                                            <i class="fas fa-times"></i>&nbsp;
                                            <span>Batal</span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2019.</p>
                        </div>
                    </div>
                </div>
            <!-- END MAIN CONTENT-->
            
<?php include "component/footer.php" ?>

