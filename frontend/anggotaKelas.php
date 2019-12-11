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
                                <h3 class="text-center title-2">Anggota Kelas</h3>
                            </div>
                            <hr>
                            <?php
                            if (isset($_SESSION['pesan'])) {
                                echo $_SESSION['pesan'];
                                unset ($_SESSION['pesan']);
                                }
                            ?>
                            <form action="../backend/anggotaKelas.php" method="post">
                                <div class="form-group">
                                    <label for="tahun" class="control-label mb-1">Tahun</label>
                                    <input id="tahun" name="tahun" type="text" class="form-control" placeholder="Example: 2010" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Nama Lengkap</label>
                                    <input id="name" name="namaLengkap" type="text" class="form-control" placeholder="Example: Mike Joshua" required>
                                </div>
                                <div class="form-group">
                                    <label for="class" class="control-label mb-1">Kelas</label>
                                    <input id="class" name="kelas" type="text" class="form-control" placeholder="Example : 6 CB" required>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-6 pb-3">
                                        <button name="anggotaKelas" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fas fa-save"></i>&nbsp;
                                            <span>Simpan</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <a href="#" onclick="javascript:eraseAnggota();" type="submit" class="btn btn-lg btn-info btn-block">
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

