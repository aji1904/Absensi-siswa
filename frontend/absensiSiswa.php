<?php 
error_reporting(0);

include "../backend/connect.php";
include "component/header.php"; 
if(!isset($_SESSION['userData'])){
    header("Location: login.php");
    die();
}

$listKelas = mysqli_query($connect, 'SELECT DISTINCT kelas FROM anggota_kelas ORDER BY kelas ASC');
$listTahun = mysqli_query($connect, 'SELECT DISTINCT tahun FROM anggota_kelas ORDER BY tahun ASC');


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
                                <h3 class="text-center title-2">Absensi Siswa</h3>
                            </div>
                            <hr>
                            <?php
                                if (isset($_SESSION['absenSiswa'])) {
                                    echo $_SESSION['absenSiswa'];
                                    unset($_SESSION['absenSiswa']);
                                }
                                
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control-lg form-control">
                                        <option value="">Please select</option>
                                    <?php
                                        foreach($listTahun as $row){
                                            echo '<option value="'.$row['tahun'].'">'.$row['tahun'].'</option>';
                                        }
                                    ?>
                                    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control-lg form-control">
                                        <option value="">Please select</option>
                                        <?php
                                            foreach($listKelas as $row){
                                                echo '<option value="'.$row['kelas'].'">'.$row['kelas'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group pt-2 pb-1">
                                    <button type="submit" name="cari" class="btn btn-lg btn-info btn-block">
                                        <i class="fas fa-search"></i>&nbsp;
                                        <span>Cari Siswa</span>
                                    </button>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['cari'])){
                                    $tahun = $_POST['tahun'];
                                    $kelas = $_POST['kelas'];
                                    
                                    $query = "SELECT * FROM anggota_kelas WHERE tahun = '".$tahun."' AND kelas = '".$kelas."' ";
                                    $cari = mysqli_query($connect, $query);
                                    $cekData = mysqli_num_rows($cari);
                                    
                                    if ($cekData == 0) {
                                        echo '<div class="alert alert-danger text-center" role="alert">Data tidak ditemukan</div>';
                                        header("Location: absensiSiswa.php");
                                    }else{
                                        echo '<div class="alert alert-success text-center" role="alert">Data ditemukan</div>';
                                    
                            ?>
                            <hr>
                            <form action="../backend/absenSiswa.php" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tangggal" class="control-label mb-1">Tanggal Hari ini</label>
                                        <input id="tanggal" name="tanggal" type="date" class="form-control" aria-required="true" aria-invalid="false" placeholder="02/24/2019" required>
                                    </div>

                                        <label>Nama Siswa</label>
                                        <div class="user-data p-1">
                                            <div class="table-responsive table-data">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td class="pl-2 pr-2">No</td>
                                                            <td class="pl-2 pr-2">Nama Siswa</td>
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
                                                                    <input type="hidden" name="kelas[]" value="<?php echo $row['kelas']?>">
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
                                            <button type="submit" name="absenSiswa" class="btn btn-lg btn-info btn-block">
                                                <i class="fas fa-save"></i>&nbsp;
                                                <span>Absen Siswa</span>
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
                                    header("Location: absensiSiswa.php");
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

