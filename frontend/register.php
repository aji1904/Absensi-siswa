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
                                <h3>Si Semut</h3>
                            </a>
                        </div>
                           <?php
                            if (isset($_SESSION['pesan'])) {
                                echo $_SESSION['pesan'];
                                unset ($_SESSION['pesan']);
                            }
                           ?>
                        <div class="login-form">
                            <form action="../backend/register.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="user" placeholder="User" require>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" require>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="Email" require>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input class="au-input au-input--full" type="tel" name="telepon" placeholder="telepon" require>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="select" class="form-control-lg form-control" require>
                                        <option value="">Please select</option>
                                        <option value="admin">Admin</option>
                                        <option value="ketua">Ketua</option>
                                        <option value="pembina">Pembina</option>
                                    </select>
                                </div>
                                <br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php include "component/footer.php" ?>
