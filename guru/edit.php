<!-- select data guru from database -->
<?php
  include 'database.php';
    $db = new database();    
    $db->getguru_edit($_GET['id']);
?>

<!-- form edit guru -->
<div class="container-fluid bg-primary text-light">
    <div class="row p-1 mt-2">
        <div class="col-1">
            <a href="?p=data-guru" class="text-white">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="col-10">
            <h5>Edit Data Guru</h5>
        </div>
    </div>
</div>
<div class="container p-4 editform">
    <form action="guru/proses.php?aksi=edit" method="post" enctype="multipart/form-data">
        <?php foreach($db->getguru_edit($_GET['id']) as $x): ?>
        <input type="hidden" name="id" value="<?php echo $x['id_guru']; ?>">
        <input type="hidden" name="gambarlama" value="<?php echo $x['foto']; ?>">
        <div class="text-center">
            <img src="img/<?php echo $x['foto']; ?>"
                style="width: 150px; height:150px; object-fit:cover;  border-radius:50%;">
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="<?php echo $x['nip']; ?>">
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $x['nama_lengkap']; ?>">
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $x['tempat_lahir']; ?>">
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $x['tgl_lahir']; ?>">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="L" <?php if($x['jenis_kelamin'] == 'L'){echo "selected";} ?>>Laki-Laki</option>
                <option value="P" <?php if($x['jenis_kelamin'] == 'P'){echo "selected";} ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?php echo $x['alamat']; ?></textarea>
        </div>

        <div class="form-group">
            <label>No Telp</label>
            <input type="text" name="notelp" class="form-control" value="<?php echo $x['notelp']; ?>">
        </div>

        <div class="form-group">
            <label>Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="form-control" value="<?php echo $x['mata_pelajaran']; ?>">
        </div>

        <div class="form-group">
            <label>Update Foto</label>
            <br>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Update Data">
        </div>
        <?php endforeach; ?>
    </form>
</div>