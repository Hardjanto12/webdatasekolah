<?php 
include '../database.php';
include '../login/registrasiguru.php';

$db = new database();
$registguru = new registrasiguru();

$aksi = $_GET['aksi'];	

 if($aksi == "tambah"){
	$db->addguru($_POST['nip'],$_POST['nama_lengkap'],$_POST['tempat_lahir'],$_POST['tgl_lahir'],$_POST['jenis_kelamin'],$_POST['alamat'],$_POST['notelp'],$_POST['mata_pelajaran'],$_POST['foto']);
	$registguru->registerguru($_POST['nip'],$_POST['nip']);
  	header("location:../admin.php?p=data-guru");
 }elseif($aksi == "hapus"){ 	
 	$db->hapusguru($_GET['id']);
	header("location:../admin.php?p=data-guru");
 }elseif($aksi == "edit"){
	 var_dump($_POST);

	$db->editguru($_POST['id'],$_POST['nip'], $_POST['nama_lengkap'],$_POST['tempat_lahir'], $_POST['tgl_lahir'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['notelp'], $_POST['mata_pelajaran'], $_POST['gambarlama'] , $_FILES['foto']);
  	header("location:../admin.php?p=data-guru");
 }
?>