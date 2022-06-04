<form action="alumni/proses.php?aksi=tambah" method="post" enctype="multipart/form-data" class="text-start">
    <div class="form-group">
        <label>NIPD</label>
        <input type="text" name="nipd" class="form-control" placeholder="NIPD" value="" required>
    </div>
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
    </div>
    <!-- create form tempat lahir -->
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
    </div>
    <div class="form-group">
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" required>
    </div>
    <div class="form-group">
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" required>
    </div>
    <div class="form-group">
        <label>No Telp</label>
        <input type="text" name="notelp" class="form-control" placeholder="No Telp">
    </div>

    <div class="form-group">
        <label>Tahun Lulus</label>
        <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>