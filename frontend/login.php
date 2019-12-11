<?php 
error_reporting(0);

include "../backend/connect.php";
include "component/header.php";
?>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" style="height: auto; padding-bottom: 60px;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3>Sistem Informasi</h3><h3>Sekolah Minggu GMI Efrata</h3>
                            </a>
                        </div>
                        <?php
                            if (isset($_SESSION['pesan'])) {
                                echo $_SESSION['pesan'];
                                unset ($_SESSION['pesan']);
                            }
                        ?>
                        <div class="login-form">
                            <form action="../backend/login.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="User" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="select">Login Sebagai</label>
                                    <select name="status" id="select" class="form-control-lg form-control" required>
                                        <option value="">Please select</option>
                                        <option value="admin">Admin</option>
                                        <option value="ketua">Ketua</option>
                                        <option value="pembina">Pembina</option>
                                    </select>
                                </div>
                                <br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="login" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php include "component/footer.php" ?>
