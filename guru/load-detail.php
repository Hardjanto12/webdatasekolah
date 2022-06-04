<!-- table data siswa which data came from ajax-->
<?php 
    include '../database.php';
    $db = new Database();

    $id  = $_POST['idguru'];
    $detail = $db->select_data("SELECT * FROM guru where id_guru = '$id'");
    
    
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
        <td id="nuptk"><?= $x['nuptk'];?></td>
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
        <th>Alamat</th>
        <td id="alamat"><?= $x['alamat'];?></td>
    </tr>
    <tr>
        <th>No. HP</th>
        <td id="notelp"><?= $x['notelp'];?></td>
    </tr>
    <tr>
        <th>Mata Pelajaran</th>
        <td id="mata_pelajaran"><?= $x['mata_pelajaran'];?></td>
    </tr>
    <?php endforeach?>
    <?php }?>
</table>
<!-- load data get from ajax -->