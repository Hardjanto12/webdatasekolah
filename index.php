<?php
include 'database.php';

$db = new database();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class=" container">
            <a class="navbar-brand" href="#">SMA <b>HANG TUAH 4</b></a>
            <div class=" d-flex my-2 my-lg-0">
                <div class="d-grid gap-2">
                    <button type="button" class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navs" aria-controls="navs" aria-expanded="false"
                        aria-label="Toggle navigation"><i class="bi bi-list"></i></button>
                </div>
                <div class="collapse navbar-collapse" id="navs">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="data/data.php?p=data-siswa">Siswa</a></li>
                                <li><a class="dropdown-item" href="data/data.php?p=data-alumni">Alumni</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="data/data.php?p=data-guru">Guru</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login/login.php" id="btnLogin"><strong>Sign In</strong></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- main content -->
    <div class="container p-3 mb-3 text-center">
        <div class="row">
            <div class="col">
                <h4 class="display-4">SELAMAT DATANG DI WEBSITE DATABASE</h4>
                <h3 class="display-3" style="color: #fcb920"><strong>SMA HANG TUAH 4</strong></h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <img style="width: 500px; height: auto;" src="img/stats.svg" alt="stats illustration">
            </div>
        </div>
    </div>
    <div class="container-fluid p-3 text-center mt-3" id="about">
        <div class="row mb-5">
            <h2 class="display-3">About Us</h2>
        </div>
        <div class="d-flex justify-content-around mb-3">
            <div class="p-2 ">
                <img src="img/about.svg" alt="about" style="width: 500px; height: auto;">
            </div>
            <div class="p-2 ">
                <div class="row d-flex">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td class="text-start"><strong>NPSN</strong></td>
                                    <td class="text-end">20532398</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>STATUS</strong></td>
                                    <td class="text-end">SWASTA</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>BENTUK PENDIDIKAN</strong></td>
                                    <td class="text-end">SMA</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>STATUS KEPEMILIKAN</strong></td>
                                    <td class="text-end">YAYASAN</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>SK PENDIRIAN SEKOLAH</strong></td>
                                    <td class="text-end">1357/104.7.4</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>TANGGAL SK PENDIRIAN</strong></td>
                                    <td class="text-end">1991-05-27</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>SK IZIN OPERASIONAL</strong></td>
                                    <td class="text-end">P2T/644/19.03/01/IV/2019</td>
                                </tr>
                                <tr>
                                    <td class="text-start"><strong>TANGGAL SK IZIN OPERASIONAL</strong></td>
                                    <td class="text-end">2019-03-19</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-3 mt-3 text-center" id="contact">
        <div class="row mb-5">
            <h2 class="display-3">Contact</h2>
        </div>
        <div class="d-flex justify-content-around mb-3">
            <div class="p-2">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td class="text-start"><strong>Alamat</strong></td>
                                <td class="text-end">Jl. Bogowonto No. 18 Surabaya</td>
                            </tr>
                            <tr>
                                <td class="text-start"><strong>Telp.</strong></td>
                                <td class="text-end">031-5617695</td>
                            </tr>
                            <tr>
                                <td class="text-start"><strong>Fax.</strong></td>
                                <td class="text-end">5617695</td>
                            </tr>
                            <tr>
                                <td class="text-start"><strong>Email</strong></td>
                                <td class="text-end">smaht_4@yahoo.co.id</td>
                            </tr>
                            <tr>
                                <td class="text-start"><strong>Akreditasi</strong></td>
                                <td class="text-end">A</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="container-fluid">
                    <img src="img/call.svg" alt="contact" style="width: 500px; height: auto;">
                </div>
            </div>
        </div>
    </div>




    <!-- end of main content -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>