<form action="guru/proses.php?aksi=tambah" method="post" enctype="multipart/form-data" class="text-start">
    <div class="form-group">
        <label>NUPTK</label>
        <input type="text" name="nuptk" class="form-control" placeholder="NUPTK" value="" required>
    </div>
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
    </div>
    <!-- form tempat lahir -->
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
        <label>No Telp</label>
        <input type="text" name="notelp" class="form-control" placeholder="No Telp">
    </div>
    <div class="form-group">
        <label>Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" class="form-control" placeholder="Mata Pelajaran">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>