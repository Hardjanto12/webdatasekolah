<!-- select data siswa from database -->
<?php
  include 'database.php';
    $db = new database();
    $db->getdata_edit($_GET['id']);
    
?>

<!-- form edit siswa -->
<div class="container-fluid bg-primary text-light">
    <div class="row p-1 mt-2">
        <div class="col-1">
            <a href="?p=data-siswa" class="text-white">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="col-10">
            <h5>Edit Data Siswa</h5>
        </div>
    </div>
</div>
<div class="container p-4 editform">
    <form action="siswa/proses.php?aksi=update" method="post" enctype="multipart/form-data">
        <?php foreach($db->getdata_edit($_GET['id']) as $x): ?>
        <input type="hidden" name="id" value="<?php echo $x['id_siswa']; ?>">
        <div class="form-group">
            <label>NIPD</label>
            <input type="text" name="nipd" class="form-control" value="<?php echo $x['nipd']; ?>" required>
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $x['nama_lengkap']; ?>"
                required>
        </div>
        <!-- create form tempat lahir -->
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $x['tempat_lahir']; ?>"
                required>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <!-- create date input with d-m-Y format -->
            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $x['tanggal_lahir']; ?>"
                required>
        </div>
        <!--         
            <input type="date" name="tgl_lahir" class="form-control" value="<?php #echo $x['tgl_lahir']; ?>" required> -->
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
    <label>Nama Ayah</label>
    <input type="text" name="nama_ayah" class="form-control" value="<?php echo $x['nama_ayah']; ?>" required>
</div>

<div class="form-group">
    <label>Nama Ibu</label>
    <input type="text" name="nama_ibu" class="form-control" value="<?php echo $x['nama_ibu']; ?>" required>
</div>

<div class="form-group">
    <label>No Telp</label>
    <input type="text" name="notelp" class="form-control" value="<?php echo $x['notelp']; ?>" required>
</div>

<div class="form-group">
    <label>Tahun Lulus</label>
    <input type="text" name="tahun_lulus" class="form-control" value="<?php echo $x['tahun_lulus']; ?>">
</div>
<div class="form-group">
    <input type="submit" name="submit" class="btn btn-primary" value="Update Data">
</div>
<?php endforeach; ?>
</form>
<!-- end form edit siswa -->
</div>