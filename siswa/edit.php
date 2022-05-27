<?php 
include 'db_siswa.php';
$db = new dbsiswa();
?>

<h3>Edit Data User</h3>

<form action="proses.php?aksi=update" method="post">
    <?php
foreach($db->getdata_edit($_GET['id']) as $d){
?>
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $d['id_admin'] ?>">
                <input type="text" name="username" value="<?php echo $d['username'] ?>">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $d['password'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    <?php } ?>
</form>