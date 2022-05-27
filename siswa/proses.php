<?php 
include '../db_siswa.php';
$db = new dbsiswa();
 
$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
 	$db->input($_POST['username'],$_POST['password']);
 	header("location:../admin.php?p=data-siswa");
 }elseif($aksi == "hapus"){ 	
 	$db->hapus($_GET['id']);
	header("location:../admin.php?p=data-siswa");
 }elseif($aksi == "update"){
 	$db->update($_POST['id'],$_POST['username'],$_POST['password']);
 	header("location:../admin.php?p=data-siswa");
 }
?>