<?php 
    $page = $_GET['p'];
    if ($page == "data-siswa") {
        include "siswa/tampil.php";   
    }   
    elseif ($page == "data-siswa-edit") {
        include "siswa/edit.php";
    }
?>