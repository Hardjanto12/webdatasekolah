<?php
$page = $_GET['p'];
if ($page == "data-siswa") {
    include "siswa.php";
}
elseif ($page == "data-alumni") {
    include "alumni.php";
}
elseif ($page == "data-guru") {
    include "guru.php";
}
?>