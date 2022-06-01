<!-- create bootstrap 5 form nis, nama lengkap, tanggal lahir, jenis kelamin, alamat, nama_ayah, nama_ibu, notelp, foto, tahun_lulus and submit button -->
<form action="siswa/proses.php?aksi=tambah" method="post" enctype="multipart/form-data" class="text-start">
    <div class="form-group">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" placeholder="NIS" value="">
    </div>
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" value="" min="1980-01-01" max="2030-12-31">
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
        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
    </div>
    <div class="form-group">
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
    </div>
    <div class="form-group">
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
    </div>
    <div class="form-group">
        <label>No Telp</label>
        <input type="text" name="notelp" class="form-control" placeholder="No Telp">
    </div>
    <!-- form to save picture into img folder -->
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control" placeholder="Foto">
    </div>
    <div class="form-group">
        <label>Tahun Lulus</label>
        <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value="NULL">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>