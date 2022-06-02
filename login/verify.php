<?php 
// page to verify session

    session_start();
    if (isset($_SESSION['username'])) {
        header("admin.php?p=home");
    }
    else {
        header("location:login/login.php");
    }

?>