<?php 
include 'siswa/db_siswa.php';
$db = new dbsiswa();
?>

<h3>Data Siswa</h3>
<div class="container-fluid">
    <a class="btn btn-primary btn-lg " href="siswa/input.php" role="button"><i class="bi bi-plus-lg"></i> Tambahkan
        Siswa</a>
    <!-- <a href="siswa/input.php">Input Data</a> -->
</div>
<!-- start tabel -->
<div class="container-fluid p-2">
    <table class="table table-sm text-center table-striped table-bordered align-middle">
        <tr class="table-success">
            <th>No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        <?php
	$no = 1;
	foreach($db->select_data("select * from siswa") as $x){
	?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['nis']; ?></td>
            <td><?php echo $x['nama_lengkap']; ?></td>
            <td><?php echo $x['tgl_lahir']; ?></td>
            <td><?php echo $x['jenis_kelamin']; ?></td>
            <td><?php echo $x['alamat']; ?></td>
            <td width="18%" class="content-space-between">
                <a class="btn btn-sm btn-warning" href="siswa/edit.php?id=<?php echo $x['id_siswa']; ?>&aksi=edit"><i
                        class="bi bi-pencil-square"></i> Edit</a>
                <span> </span>
                <a class="btn btn-sm btn-danger" href="siswa/proses.php?id=<?php echo $x['id_siswa']; ?>&aksi=hapus"><i
                        class="bi bi-trash"></i>
                    Hapus</a>
            </td>
        </tr>
        <?php 
	}
	?>
        <tr>

        </tr>
    </table>
</div>