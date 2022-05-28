<?php 
include 'siswa/db_siswa.php';
$db = new dbsiswa();
?>

<div class="container-fluid ps-3 pe-3 align-top">

    <div class="row">
        <h3 class="display-5">Data Siswa</h3>
    </div>

    <div class="row mb-3 justify-space-between">
        <div class="col-8"></div>
        <div class="col-4 text-end">
            <?php include "siswa/modal_addsiswa.php"; ?>
        </div>
    </div>



    <!-- start tabel -->
    <div class="row">
        <table class="table table-sm text-center table-striped table-bordered align-middle">
            <tr class="table-success">
                <th>No</th>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
            <?php
	$no = 1;
	foreach($db->select_data("select * from siswa") as $x):
	?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><img style="width:75px; height:75px; object-fit:cover;  border-radius:50%;"
                        src="img/<?php if (empty($x['foto'])) { echo "user-default.png"; } else { echo $x['foto']; } ?>">
                </td>
                <td><?php echo $x['nis']; ?></td>
                <td><?php echo $x['nama_lengkap']; ?></td>
                <td><?php echo $x['tgl_lahir']; ?></td>
                <td><?php echo $x['jenis_kelamin']; ?></td>
                <td><?php echo $x['alamat']; ?></td>
                <td width="18%" class="content-space-between">
                    <a class="btn btn-sm btn-warning"
                        href="siswa/edit.php?id=<?php echo $x['id_siswa']; ?>&aksi=edit"><i
                            class="bi bi-pencil-square"></i> Edit</a>
                    <span> </span>
                    <a class="btn btn-sm btn-danger"
                        href="siswa/proses.php?id=<?php echo $x['id_siswa']; ?>&aksi=hapus"><i class="bi bi-trash"></i>
                        Hapus</a>
                </td>
            </tr>
            <?php 
    endforeach;
	?>
            <tr>

            </tr>
        </table>
    </div>
    <!-- end table -->
</div>