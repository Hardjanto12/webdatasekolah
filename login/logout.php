<?php 
// create logout process
include '../database.php';
session_start();
session_destroy();
header("location:login.php");
?>