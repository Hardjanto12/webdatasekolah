<?php
require '../database.php';
require_once '../vendor/autoload.php';

$dummy = new database();

$faker = Faker\Factory::create();
$matapelajaran = array('Guru Mapel', 'Guru BK');
$jk = array('L', 'P');


if (isset($_POST['add'])) {
    for ($i = 0; $i < 10; $i++) {
        $nipd = mt_rand(100000000000, 999999999999);
        $date = rand(1975, 2004) . "-" . rand(1, 12) . "-" . rand(1, 29);
        $notelp = "08" . rand(1000000000, 9999999999);
        $jenis = $jk[array_rand($jk)];
        $year = '0000';
        $nama = htmlspecialchars($faker->name);
        $nama_ayah = htmlspecialchars($faker->name);
        $nama_ibu = htmlspecialchars($faker->name);

        $dummy->input($nipd, $nama, $faker->city, $date, $jenis, $faker->address, $nama_ayah, $nama_ibu, $notelp, $year);
    }
    if (mysqli_affected_rows($dummy->conn)) {
        echo "Data berhasil ditambahkan";
        echo "<br>";
    }
    else {
        echo "Data gagal ditambahkan";
        echo "<br>";
        echo mysqli_error($dummy->conn);
    }
}
if (isset($_POST['addalumni'])) {
    for ($i = 0; $i < 10; $i++) {
        $nipd = mt_rand(100000000000, 999999999999);
        $date = rand(1975, 2004) . "-" . rand(1, 12) . "-" . rand(1, 29);
        $notelp = "08" . rand(1000000000, 9999999999);
        $jenis = $jk[array_rand($jk)];
        $year = rand(1975, 2021);
        $nama = htmlspecialchars($faker->name);
        $nama_ayah = htmlspecialchars($faker->name);
        $nama_ibu = htmlspecialchars($faker->name);

        $dummy->input($nipd, $nama, $faker->state, $date, $jenis, $faker->address, $nama_ayah, $nama_ibu, $notelp, $year);
    }
    if (mysqli_affected_rows($dummy->conn)) {
        echo "Data berhasil ditambahkan";
        echo "<br>";
    }
    else {
        echo "Data gagal ditambahkan";
        echo "<br>";
        echo mysqli_error($dummy->conn);
    }
}

if (isset($_POST['addguru'])) {
    for ($i = 0; $i < 10; $i++) {
        $nuptk = mt_rand(100000000000, 999999999999);
        $date = rand(1975, 2004) . "-" . rand(1, 12) . "-" . rand(1, 29);
        $notelp = "08" . rand(1000000000, 9999999999);
        $mapel = $matapelajaran[array_rand($matapelajaran)];
        $jenis = $jk[array_rand($jk)];
        $year = rand(1975, 2021);
        $nama = htmlspecialchars($faker->name);

        $dummy->addguru($nuptk, $nama, $faker->state, $date, $jenis, $faker->address, $notelp, $mapel);
    }
    if (mysqli_affected_rows($dummy->conn)) {
        echo "Data berhasil ditambahkan";
        echo "<br>";
    }
    else {
        echo "Data gagal ditambahkan";
        echo "<br>";
        echo mysqli_error($dummy->conn);
    }
}
?>

<!-- create one button to add data -->
<form action="" method="post">
    <input type="submit" name="add" value="Add Data Siswa">
</form>
<form action="" method="post">
    <input type="submit" name="addalumni" value="Add Data Alumni">
</form>
<form action="" method="post">
    <input type="submit" name="addguru" value="Add Data Guru">
</form>