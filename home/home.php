<?php 
    include 'database.php';
    $home = new database();
    $username =  $_SESSION['username'];
    $id = $_SESSION['id_admin'];
    // join query admin and guru
    $query = "SELECT * FROM admin JOIN guru ON admin.username = guru.nuptk WHERE admin.username = '$username'";
    $row = $home->select_data($query)[0];
    
?>

<!-- show detail in page -->
<div class="container p-3">
    <div class="row">
        <div class="col-md-12">
            <?php 
            // check if nuptk == password
            if (password_verify($row['nuptk'],$row['password']) == true) {
                echo '<div class="alert alert-warning" role="alert">
                Harap segera ganti password anda, <a href="?p=ganti-password" class="alert-link">klik
                    disini</a> untuk segera
                mengganti password anda.
            </div>';
            }
            ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                </tr>
                                <tr>
                                    <td>NUPTK</td>
                                    <td><?php echo $row['nuptk']; ?></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td><?php echo $row['notelp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $row['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td><?php echo $row['tgl_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mata Pelajaran</td>
                                    <td><?php echo $row['mata_pelajaran']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>