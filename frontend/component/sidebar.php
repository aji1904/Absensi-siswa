<!-- MENU SIDEBAR-->
<?php
    if($_SESSION['status'] == 'admin'){
?>
<!-- NAVBAR MOBILE -->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="#">
                        <h3>Menu</h3>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="profile.php">
                            <i class="fas fa-user-shield"></i>Profile
                        </a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-table"></i>Transaksi</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="bukuIndukMurid.php">Buku Induk Murid</a>
                            </li>
                            <li>
                                <a href="bukuIndukGuru.php">Buku Induk Guru</a>
                            </li>
                            <li>
                                <a href="anggotaKelas.php">Anggota Kelas</a>
                            </li>
                            <li>
                                <a href="absensiSiswa.php">Absen Siswa</a>
                            </li>
                            <li>
                                <a href="absensiGuru.php">Absen Guru</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-book"></i>Laporan</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="laporanGuru.php">Laporan Guru</a>
                            </li>
                            <li>
                                <a href="laporanSiswa.php">Laporan Siswa</a>
                            </li>
                            <li>
                                <a href="laporanKelas.php">Laporan Kelas</a>
                            </li>
                            <li>
                                <a href="laporanAbsenSiswa.php">Laporan Absensi Siswa</a>
                            </li>
                            <li>
                                <a href="laporanAbsenGuru.php">Laporan Absensi Guru</a>
                            </li>
                        </ul>
                    <li class="has-sub">
                    <!-- Button trigger modal -->
                    <a class="js-arrow" href="#" data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fas fa-power-off" style="color: red;"></i>Keluar
                    </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<!-- MODAL -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                Anda Yakin Ingin Keluar dari Sistem Informasi Sekolah Minggu GMI Efrata
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <a href="logout.php"><button type="button" class="btn btn-primary">Yakin</button></a>
                </div>
            </div>
        </div>
    </div>

<!-- SIDEBAR -->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <h3>Menu</h3>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class=" has-sub">
                        <a class="js-arrow" href="profile.php">
                            <i class="fas fa-user-shield"></i>Profile
                        </a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-table"></i>Transaksi</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="bukuIndukMurid.php">Buku Induk Murid</a>
                            </li>
                            <li>
                                <a href="bukuIndukGuru.php">Buku Induk Guru</a>
                            </li>
                            <li>
                                <a href="anggotaKelas.php">Anggota Kelas</a>
                            </li>
                            <li>
                                <a href="absensiSiswa.php">Absen Siswa</a>
                            </li>
                            <li>
                                <a href="absensiGuru.php">Absen Guru</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-book"></i>Laporan</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="laporanGuru.php">Laporan Guru</a>
                            </li>
                            <li>
                                <a href="laporanSiswa.php">Laporan Siswa</a>
                            </li>
                            <li>
                                <a href="laporanKelas.php">Laporan Kelas</a>
                            </li>
                            <li>
                                <a href="laporanAbsenSiswa.php">Laporan Absensi Siswa</a>
                            </li>
                            <li>
                                <a href="laporanAbsenGuru.php">Laporan Absensi Guru</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <!-- Button trigger modal -->
                        <a class="js-arrow" href="#" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="fas fa-power-off" style="color: red;"></i>Keluar
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<?php
}
else{
?>
<!-- NAVBAR MOBILE -->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <h3>Menu</h3>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="profile.php">
                            <i class="fas fa-user-shield"></i>Profile
                        </a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-book"></i>Laporan</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="laporanGuru.php">Laporan Guru</a>
                            </li>
                            <li>
                                <a href="laporanSiswa.php">Laporan Siswa</a>
                            </li>
                            <li>
                                <a href="laporanKelas.php">Laporan Kelas</a>
                            </li>
                            <li>
                                <a href="laporanAbsenSiswa.php">Laporan Absensi Siswa</a>
                            </li>
                            <li>
                                <a href="laporanAbsenGuru.php">Laporan Absensi Guru</a>
                            </li>
                        </ul>
                    <li class="has-sub">
                    <!-- Button trigger modal -->
                    <a class="js-arrow" href="#" data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fas fa-power-off" style="color: red;"></i>Keluar
                    </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<!-- MODAL -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                Anda Yakin Ingin Keluar dari Sistem Informasi Sekolah Minggu GMI Efrata
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <a href="logout.php"><button type="button" class="btn btn-primary">Yakin</button></a>
                </div>
            </div>
        </div>
    </div>

<!-- SIDEBAR -->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <h3>Menu</h3>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class=" has-sub">
                        <a class="js-arrow" href="profile.php">
                            <i class="fas fa-user-shield"></i>Profile
                        </a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-book"></i>Laporan</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="laporanGuru.php">Laporan Guru</a>
                            </li>
                            <li>
                                <a href="laporanSiswa.php">Laporan Siswa</a>
                            </li>
                            <li>
                                <a href="laporanKelas.php">Laporan Kelas</a>
                            </li>
                            <li>
                                <a href="laporanAbsenSiswa.php">Laporan Absensi Siswa</a>
                            </li>
                            <li>
                                <a href="laporanAbsenGuru.php">Laporan Absensi Guru</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <!-- Button trigger modal -->
                        <a class="js-arrow" href="#" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="fas fa-power-off" style="color: red;"></i>Keluar
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
<?php
}
?>
    <!-- END MENU SIDEBAR-->