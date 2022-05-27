<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icon cdn fontawesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">


</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">Data<b>Sekolah</b>
            <label for="checkbox">
                <i id="navbtn" class="bi bi-list" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Expand menu"></i>
            </label>
        </h2>
        <!-- <i class="bi bi-person-fill" aria-hidden="true"></i> -->
    </header>
    <div class="body">
        <!-- sidebar -->
        <nav class="side-bar">
            <!-- <div class="user-p">
                <img src="img\user-default.png" alt="">
                <h4 class="mt-2">Full Name</h4>
            </div> -->
            <ul>
                <a href="?p=home">
                    <li>
                        <i class="bi bi-laptop"></i>
                        <span>Home</span>
                    </li>
                </a>
                <a href="?p=data-guru">
                    <li>
                        <i class="bi bi-person-video3"></i>
                        <span>Data Guru</span>
                    </li>
                </a>
                <a href="?p=data-siswa">
                    <li>
                        <i class="bi bi-people"></i>
                        <span>Data Siswa</span>
                    </li>
                </a>
                <a href="?p=data-alumni">
                    <li>
                        <i class="bi bi-mortarboard"></i>
                        <span>Data Alumni</span>
                    </li>
                </a>
                <a href="?p=ganti-password">
                    <li>
                        <i class="bi bi-gear"></i>
                        <span>Ubah Password</span>
                    </li>
                </a>
                <a href="?p=logout">
                    <li>
                        <i class="bi bi-power"></i>
                        <span>Logout</span>
                    </li>
                </a>
            </ul>
        </nav>

        <!-- main content -->
        <section class="section-1">
            <?php 
            $page = $_GET['p'];
            if ($page == "data-siswa") {
                include "siswa/tampil.php";   
            }   
            ?>
        </section>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>