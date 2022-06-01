<?php 
include '../database.php';
$db = new database();

$aksi = $_GET['aksi'];	

 if($aksi == "tambah"){
	$db->input($_POST['nis'], $_POST['nama_lengkap'], $_POST['tgl_lahir'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['nama_ayah'], $_POST['nama_ibu'], $_POST['notelp'], $_FILES['foto'], $_POST['tahun_lulus']);
  	header("location:../admin.php?p=data-alumni");
 }elseif($aksi == "hapus"){ 	
 	$db->hapus($_GET['id']);
	header("location:../admin.php?p=data-alumni");
 }elseif($aksi == "update"){
	$db->update($_POST['id'],$_POST['nis'], $_POST['nama_lengkap'], $_POST['tgl_lahir'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['nama_ayah'], $_POST['nama_ibu'], $_POST['notelp'], $_POST['gambarlama'] , $_FILES['foto'], $_POST['tahun_lulus']);
 	header("location:../admin.php?p=data-alumni");
 }
?>