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
            <!-- Search -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light m-2">
                <a class="navbar-brand" href="#">Cari Data Siswa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-search"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                    <form class="form-inline my-2 my-lg-0" method="POST">
                        <select id="ket" name="select" class="form-control m-2" required>
                            <option value="">Please select</option>
                            <option value="namaLengkap">Nama Lengkap</option>
                            <option value="namaPanggilan">Nama Panggilan</option>
                            <option value="tahunMasuk">Tahun Masuk</option>
                        </select>
                        <input class="form-control mr-sm-2 m-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
                        <button class="btn btn-outline-success my-2 my-sm-0 m-2" type="submit" name="cari">Search</button>
                    </form>
                    <form method="POST">
                        <button class="btn btn-outline-success my-2 my-sm-0 m-2" type="submit" name="semua">Semua Data</button>
                    </form>
                </div>
                </nav>
                <div class="row p-2">
                    <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header">Laporan Absensi Siswa</div>
                        <div class="card-body">
                            
                        <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table-data3" style="border: 1px solid">
                                        <thead>
                                            <tr>
                                                <th class="pl-3 pr-3">No</th>
                                                <th>Foto</th>
                                                <th>Nama Lengkap</th>
                                                <th>Nama Panggilan</th>
                                                <th>Alamat</th>
                                                <th>Tempat Lahir</th>
                                                <th>tanggal Lahir</th>
                                                <th>Nama Ayah</th>
                                                <th>No. Telp Ayah</th>
                                                <th>Nama Ibu</th>
                                                <th>No. Telp Ibu</th>
                                                <th>Tahun Masuk</th>
                                            </tr>
                                        </thead>
                                <?php

                                    if(isset($_POST['cari'])){
                                        $select = $_POST['select'];
                                        $string = $_POST['search'];

                                        $data = mysqli_query($connect, "SELECT * FROM buku_murid WHERE $select LIKE '$string%' ");
                                        $showData = mysqli_num_rows($data); 
                                    }elseif(isset($_POST['semua'])){

                                        $data = mysqli_query($connect, "SELECT * FROM buku_murid");
                                        $showData = mysqli_num_rows($data);
                                    }else{
                                        $data = mysqli_query($connect, "SELECT * FROM buku_murid");
                                        $showData = mysqli_num_rows($data);
                                    }
                                    if($showData > 0){
                                        $no = 1;
                                        foreach($data as $row){
                                ?>
                                        <tbody>
                                            <tr>
                                                <td class="pl-3 pr-3"><?php echo $no?></td>
                                                <td class="p-0" style="height: 120px;"><img src="<?php echo $row['foto']?>" style="height: auto; width:160px;" class="rounded mx-auto img-fluid"  alt="images"></td>
                                                <td><?php echo $row['namaLengkap']?></td>
                                                <td><?php echo $row['namaPanggilan']?></td>
                                                <td><?php echo $row['alamat']?></td>
                                                <td><?php echo $row['tempatLahir']?></td>
                                                <td><?php echo $row['tanggalLahir']?></td>
                                                <td><?php echo $row['namaAyah']?></td>
                                                <td><?php echo $row['handphoneAyah']?></td>
                                                <td><?php echo $row['namaIbu']?></td>
                                                <td><?php echo $row['handphoneIbu']?></td>
                                                <td><?php echo $row['tahunMasuk']?></td>
                                            </tr>
                                        </tbody>
                                <?php
                                        $no++;
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger text-center" role="alert">Belum ada laporan</div>';
                                    }
                                ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
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

