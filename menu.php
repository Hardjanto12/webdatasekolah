<?php 
    $page = $_GET['p'];
    if ($page == "data-siswa") {
        include "siswa/tampil.php";   
    }   
    elseif ($page == "home") {
        include "home/home.php";
    }
    elseif ($page == "data-siswa-edit") {
        include "siswa/edit.php";
    }
    elseif ($page == "data-alumni-edit") {
        include "alumni/edit.php";
    }
    elseif ($page == "data-alumni") {
        include "alumni/tampil.php";
    }
    elseif ($page == "data-guru") {
        include "guru/tampil.php";
    }
    elseif ($page == "data-guru-edit") {
        include "guru/edit.php";
    }
    elseif ($page == "ganti-password") {
        include "login/change_password.php";
    }
    elseif ($page == "logout") {
        header("location:login/logout.php");
    }
?>