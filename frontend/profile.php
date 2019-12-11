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
                            <div class="col-lg-8 mx-auto">
                                <div class="au-card au-card--no-shadow au-card--no-pad ">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="fas fa-user-shield"></i>Profile</h3>
                                    </div>
                                    <div class="card p-4 mb-0">
                                        <!-- <div class="mx-auto">
                                            <img src="component/images/bg-title-01.jpg" style="height: 200px; width:auto;"/>
                                        </div> -->
                                        <div class="row" >
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <div class="col-lg-4">Username</div>
                                                    <div class="col-lg-8"><?php echo $_SESSION['userData']['username']?></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-4">Email</div>
                                                    <div class="col-lg-8"><?php echo $_SESSION['userData']['email']?></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-4">No. Telp</div>
                                                    <div class="col-lg-8"><?php echo $_SESSION['userData']['telepon']?></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-4">Status</div>
                                                    <div class="col-lg-8"><?php echo $_SESSION['status']?></div>
                                                </div>
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

