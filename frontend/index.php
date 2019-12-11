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
                <div class="section__content section__content--p30">
                    <div class="container p-0">
                            <div class="col-lg-10 mx-auto">
                                <div class="au-card au-card--no-shadow au-card--no-pad ">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="far fa-clock"></i>12 mei 2019</h3>
                                    </div>
                                    <div class="card p-4 mb-0">
                                        <div class="row pt-5 pb-5" >
                                            <div class="col-12" align="center">
                                                <h1>Selamat Datang di Si Semut</h1><br>
                                                <h2>Sistem Informasi Sekolah Minggu GMI Efrata</h2>
                                            </div>
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
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

<?php include "component/footer.php" ?>

