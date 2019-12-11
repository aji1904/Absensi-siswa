<?php 
error_reporting(0);
include "../backend/connect.php";
include "component/header.php"; 
if(!isset($_SESSION['userData'])){
    header("Location: login.php");
    die();
}

$listKelas = mysqli_query($connect, 'SELECT DISTINCT kelas FROM anggota_kelas ORDER BY kelas ASC');
$listTahun = mysqli_query($connect, 'SELECT DISTINCT tahunMasuk FROM buku_guru ORDER BY tahunMasuk ASC');

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
                                <h3 class="text-center title-2">Absensi Guru</h3>
                            </div>
                            <hr>
                            <?php
                                if (isset($_SESSION['absenGuru'])) {
                                    echo $_SESSION['absenGuru'];
                                    unset($_SESSION['absenGuru']);
                                }
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control-lg form-control" required>
                                        <option value="">Please select</option>
                                        <?php
                                            foreach($listTahun as $row){
                                                echo '<option value="'.$row['tahunMasuk'].'">'.$row['tahunMasuk'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select id="kelas" name="kelas" id="select" class="form-control-lg form-control" required>
                                        <option value="">Please select</option>
                                        <?php
                                            foreach($listKelas as $row){
                                                echo '<option value="'.$row['kelas'].'">'.$row['kelas'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal" class="control-label mb-1">Tanggal Hari ini</label>
                                    <input id="tanggal" name="tanggal" type="date" class="form-control" aria-required="true" aria-invalid="false" placeholder="02/24/2019" required>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <select id="ket" name="status" id="select" class="form-control-lg form-control" required>
                                        <option value="">Please select</option>
                                        <option value="Sekolah Minggu">Sekolah Minggu</option>
                                        <option value="BC">BC</option>
                                        <option value="Ibadah">Ibadah</option>
                                    </select>
                                </div>
                                <div class="form-group pt-2 pb-1">
                                    <button type="submit" name="cari" class="btn btn-lg btn-info btn-block">
                                        <i class="fas fa-search"></i>&nbsp;
                                        <span>Cari Guru</span>
                                    </button>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['cari'])){
                                $tahun = $_POST['tahun'];
                                $status = $_POST['status'];
                                $kelas = $_POST['kelas'];
                                $tanggal = $_POST['tanggal'];
                                
                                $query = "SELECT * FROM buku_guru WHERE tahunMasuk = '".$tahun."' AND status_guru = '".$status."' ";
                                $cari = mysqli_query($connect, $query);
                                $cekData = mysqli_num_rows($cari);
                                
                                if ($cekData == 0) {
                                    echo '<div class="alert alert-danger text-center" role="alert">Maaf Data Tidak Ditemukan</div>';
                                    header("Location: absensiGuru.php");
                                }else{
                                    echo '<div class="alert alert-success text-center" role="alert">Data Ditemukan</div>';
                                    
                            ?>
                            <br>
                            <hr>
                            <form action="../backend/absenGuru.php" method="post">
                                <input type="hidden" name="statusGuru" value="<?php echo $status ?>">
                                <input type="hidden" name="kelasGuru" value="<?php echo $kelas ?>">
                                <input type="hidden" name="tanggalHadir" value="<?php echo $tanggal ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Nama Guru</label>
                                        <div class="user-data p-1">
                                            <div class="table-responsive table-data">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td class="pl-2 pr-2">No</td>
                                                            <td class="pl-2 pr-2">Nama Guru</td>
                                                            <td class="pl-3 pr-3">H</td>
                                                            <td class="pl-3 pr-3">T</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no=1;
                                                            foreach ($cari as $row){   
                                                        ?>
                                                        <tr>
                                                            <td class="pl-2 pr-2"><?php echo $no?></td>
                                                            <td class="pl-2 pr-2">
                                                                <div class="table-data__info">
                                                                    <h6><?php echo $row['namaLengkap']?></h6>
                                                                    <input type="hidden" name="nama[]" value="<?php echo $row['namaLengkap']?>">
                                                                </div>
                                                            </td>
                                                            <td class="pl-3 pr-3">
                                                                <label class="au-checkbox">
                                                                    <input type="checkbox" id="cekHadir<?php echo $no ?>" name="ket[]" value="" required>
                                                                    <span class="au-checkmark"></span>
                                                                </label>
                                                            </td>
                                                            <td class="pl-3 pr-3">
                                                                <label class="au-checkbox">
                                                                    <input type="checkbox" id="cekTidak<?php echo $no ?>" name="ket[]" value="" required>
                                                                    <span class="au-checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" name="statusGuru[]" value="<?php echo $status ?>">
                                                        <input type="hidden" name="kelasGuru[]" value="<?php echo $kelas ?>">
                                                        <input type="hidden" name="tanggalHadir" value="<?php echo $tanggal ?>">
                                                        <?php
                                                                $no++;
                                                                }
                                                        ?>
                                                    </tbody>
                                                </table>
                                        </div>
                                        <!-- END USER DATA-->
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 pb-3">
                                            <button name="absenGuru" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fas fa-save"></i>&nbsp;
                                                <span>Absen Guru</span>
                                            </button>
                                        </div>
                                        <div class="col-lg-6 pb-5">
                                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fas fa-times"></i>&nbsp;
                                                <span>Batal</span>
                                            </button>
                                        </div>
                                    </div>
                            </form>
                            <?php
                                }
                                header('Location: absensiGuru.php');
                            }
                            ?>
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

