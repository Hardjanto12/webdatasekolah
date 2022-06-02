<?php 
include 'database.php';
$db = new database();
$cek = $db->select_data("SELECT * FROM siswa where tahun_lulus = '0000'");
if (empty($cek)) {
    $disabled = "disabled";
}
else {
    $disabled = '';
}

?>

<div class="container-fluid ps-4 pt-3 pe-4 align-top">

    <div class="row">
        <h3 class="display-5">Data Siswa</h3>
    </div>

    <div class="row mb-3 justify-space-between">
        <div class="col-4">
            <!-- create form search data siswa -->
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data siswa" name="keyword">
                    <div class="input-group-append ms-2">
                        <button class="btn btn-primary" type="submit" name="cari" <?= $disabled?>>Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
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
    $nourut = 1;
    /* It's a pagination function. */
    $result = $db->select_data("select * from siswa where tahun_lulus = '0000'");
    if (empty($result)) {
        $result = [];
    }
    $limit = 10;
    $jumlah_data = count($result);
    $jumlah_halaman = ceil($jumlah_data / $limit);
    $halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $awal = ($halaman_aktif - 1) * $limit;
    $no = $awal + 1;
    /* This is a search function. */
    if (isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $result = $db->select_data("select * from siswa where nama_lengkap like '%$keyword%' or nis like '%$keyword%' AND tahun_lulus = '0000'");
        if (empty($result)) {
            $result = [];
            echo "<tr><td colspan='8' class='text-center'>Data '$keyword' tidak ditemukan</td></tr>";
            die;
        }
    }  

    /* It's a function to check if the data is empty or not. If the data is empty, it will show the
    message "Data masih kosong". */
    if (!empty($result)) {
        $result = $db->select_data("select * from siswa where tahun_lulus = '0000' limit $awal, $limit");
    } else {
        $result = [];
        echo "<tr><td colspan='8' class='text-center'>Data masih kosong</td></tr>";
    }
    foreach($result as $x):    
	?>
            <tr>
                <td><?php echo $nourut++; ?></td>
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
                        href="?p=data-siswa-edit&id=<?php echo $x['id_siswa']; ?>&aksi=edit"><i
                            class="bi bi-pencil-square"></i> Edit</a>

                    <span> </span>
                    <!-- create delete button with alert -->
                    <a class="btn btn-sm btn-danger" href="siswa/proses.php?id=<?php echo $x['id_siswa']; ?>&aksi=hapus"
                        onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash"></i>
                        Delete</a>
                </td>
            </tr>
            <?php 
            endforeach;
            ?>
        </table>
    </div>
    <!-- end table -->


    <!-- page navigation -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- create previous pagination button-->
                    <?php if ($halaman_aktif > 1) : ?>
                    <li class="page-item"><a class="page-link"
                            href="?p=data-siswa&halaman=<?php echo $halaman_aktif - 1; ?>">Previous</a></li>
                    </li>
                    <?php endif; ?>
                    <!-- create pagination button -->
                    <?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
                    <li class="page-item <?php if ($halaman_aktif == $i) { echo "active"; } ?>">
                        <a class="page-link" href="?p=data-siswa&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <!-- create next pagination button -->
                    <?php if ($halaman_aktif < $jumlah_halaman) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?p=data-siswa&halaman=<?php echo $halaman_aktif + 1; ?>"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- end page navigation -->
    <button class="scrollToTopBtn bg-primary"><i class="bi bi-arrow-up"></i></button>

    <footer></footer>
</div>

<script>
var target = document.querySelector("footer");
var scrollToTopBtn = document.querySelector(".scrollToTopBtn");
var rootElement = document.documentElement;

function callback(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            scrollToTopBtn.classList.add("showBtn");
        } else {
            scrollToTopBtn.classList.remove("showBtn");
        }
    });
}

function scrollToTop() {
    rootElement.scrollTo({
        top: 0,
        behavior: "smooth",
    });
}
scrollToTopBtn.addEventListener("click", scrollToTop);
let observer = new IntersectionObserver(callback);
observer.observe(target);
</script>