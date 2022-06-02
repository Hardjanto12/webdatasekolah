<?php 
include 'authentication.php';
$setting = new authentication();


$aksi = $_GET['aksi'];
if ($aksi == "ganti-password") {
    $setting->change_password($_POST['username'], $_POST['password'], $_POST['confirmpassword']);
    header("location:../admin.php?p=home");
}
?>