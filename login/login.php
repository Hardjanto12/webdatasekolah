<?php

include 'authentication.php';
$hashpwd = new authentication();

$hashpwd->hash();
?>

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/login.css">



</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="../index.php">SMA <b>HANG TUAH 4</b></a>
            <div class=" d-flex my-2 my-lg-0">
                <div class="d-grid gap-2">
                    <button type="button" class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navs" aria-controls="navs" aria-expanded="false"
                        aria-label="Toggle navigation"><i class="bi bi-list"></i></button>
                </div>
                <div class="collapse navbar-collapse" id="navs">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- main content -->
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card p-4">
                    <div class="card-title text-center">
                        <div class="row">
                            <h3>Login Page</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
if (isset($_POST['login'])) {
    $login = new authentication();
    $login->auth($_POST['username'], $_POST['password']);
}
?>
                        </div>
                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    aria-describedby="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
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