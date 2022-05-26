<?php 
require 'database.php';
$db = new database;

if(isset($_POST['submit']) & !empty($_POST['submit'])){
	$nis = $database->sanitize($_POST['nis']);
	$nama = $database->sanitize($_POST['nama']);
	$alamat = $database->sanitize($_POST['alamat']);
	$kelas = $_POST['kelas'];
	$detail = $_POST['detail'];
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add data siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <!-- title -->
    <div class="container-fluid p-3">
        <h1 class="display-4">Add data siswa</h1>
    </div>

    <!-- start form -->
    <div class="container-fluid p-3">
        <!-- nis -->
        <div class="row g-3 p-3 align-items-center">
            <div class="col-1">
                <label for="nis" class="col-form-label-sm">NIS :</label>
            </div>
            <div class="col-4">
                <input type="text" id="nis" class="form-control form-control-sm" maxlength="8" />
            </div>
        </div>
        <!-- nama -->
        <div class="row g-3 p-3 align-items-center">
            <div class="col-1">
                <label for="nama" class="col-form-label-sm">Nama :</label>
            </div>
            <div class="col-4">
                <input type="text" id="nama" class="form-control form-control-sm" />
            </div>
        </div>
        <!-- alamat -->
        <div class="row g-3 p-3 align-items-center">
            <div class="col-1">
                <label for="alamat" class="col-form-label-sm">Alamat :</label>
            </div>
            <div class="col-4">
                <input type="text" id="alamat" class="form-control form-control-sm" />
            </div>
        </div>
        <!-- kelas -->
        <div class="row g-3 p-3 align-items-center">
            <div class="col-1">
                <label for="kelas" class="col-form-label-sm">Kelas :</label>
            </div>
            <div class="col-2">
                <select class="form-select form-select-sm text-center" name="kelas">
                    <option selected>...</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-select form-select-sm text-center" name="detail">
                    <option selected>...</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
        <!-- submit -->
        <div class="d-grid gap-2 col-6 mx-auto">
            <div class="d-grid gap-4">
                <button class="btn btn-primary " type="button">Button</button>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>