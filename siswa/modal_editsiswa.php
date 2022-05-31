<!-- create button to open modal edit siswa -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_editsiswa">
    Launch demo modal
</button>

<!-- create modal edit siswa -->
<div class="modal fade" id="modal_editsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="siswa/proses.php?aksi=edit" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS"
                            value="<?php echo $x['nis']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            placeholder="Nama Lengkap" value="<?php echo $x['nama_lengkap']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                            placeholder="Tanggal Lahir" value="<?php echo $x['tgl_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L" <?php if($x['jenis_kelamin'] == 'L'){echo "selected";} ?>>Laki-Laki
                            </option>
                            <option value="P" <?php if($x['jenis_kelamin'] == 'P'){echo "selected";} ?>>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"
                            placeholder="Alamat"><?php echo $x['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No. Telp"
                            value="<?php echo $x['no_telp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>