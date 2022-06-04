<!-- table data siswa which data came from ajax-->
<?php 
    include '../database.php';
    $db = new Database();

    $id  = $_POST['idsiswa'];
    $detail = $db->select_data("SELECT * FROM siswa where id_siswa = '$id' and tahun_lulus = '0000'");
    
    
?>
<table class="table table-striped">
    <?php 
    if (!empty($detail)) {
    foreach($detail as $x): 
    ?>
    <tr>
        <th>Nama</th>
        <td id="nama_lengkap"><?= $x['nama_lengkap'];?></td>
    </tr>
    <tr>
        <th>NIPD</th>
        <td id="nipd"><?= $x['nipd'];?></td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td id="jenis_kelamin">
            <?php $jk = $x['jenis_kelamin'];
            if ($jk == 'L') {
                echo 'Laki-laki';
            } else {
                echo 'Perempuan';
            }
                ?>
        </td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td id="tempat_lahir"><?= $x['tempat_lahir'];?></td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <!-- show tanggal lahir with format d-m-Y -->
        <td id="tgl_lahir"><?= date('d-m-Y', strtotime($x['tgl_lahir']));?></td>
        <!-- <td id="tgl_lahir"><?= $x['tgl_lahir'];?></td> -->
    </tr>
    <tr>
        <th>Nama Ayah</th>
        <td id="nama_ayah"><?= $x['nama_ayah'];?></td>
    </tr>
    <tr>
        <th>Nama Ibu</th>
        <td id="nama_ibu"><?= $x['nama_ibu'];?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td id="alamat"><?= $x['alamat'];?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td id="tahun_lulus">
            <?php $status = $x['tahun_lulus'];
        if ($status == '0000') {
            echo 'Aktif';
        } else {
            echo 'Lulus';
        }?>
        </td>
    </tr>
    <tr>
        <th>No. HP</th>
        <td id="notelp"><?= $x['notelp'];?></td>
    </tr>
    <?php endforeach?>
    <?php }?>
</table>
<!-- load data get from ajax -->