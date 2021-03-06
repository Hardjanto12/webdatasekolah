<?php 
include 'database.php';
$db = new database();
$cek = $db->select_data("SELECT * FROM guru");
if (empty($cek)) {
    $disabled = "disabled";
}
else {
    $disabled = '';
}

?>

<div class="container-fluid ps-4 pt-3 pe-4 align-top">

    <div class="row">
        <h3 class="display-5">Data Guru</h3>
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
            <?php include "guru/modal_addguru.php"; ?>
        </div>
    </div>



    <!-- start tabel -->
    <div class="row">
        <table class="table table-sm text-center table-striped table-bordered align-middle">
            <tr class="table-success">
                <th>No</th>
                <th>NUPTK</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Mata Pelajaran</th>
                <th>Opsi</th>
            </tr>
            <?php
    /* It's a pagination function. */
    $result = $db->select_data("select * from guru");
    if (empty($result)) {
        $result = [];
    }
    $limit = 10;
    $jumlah_data = count($result);
    $jumlah_halaman = ceil($jumlah_data / $limit);
    $halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $awal = ($halaman_aktif - 1) * $limit;
    $num = 1;
    $nourut = $num + $awal;
    $no = $awal + 1;

    /* It's a function to check if the data is empty or not. If the data is empty, it will show the
    message "Data masih kosong". */
    if (!empty($result)) {
        $result = $db->select_data("select * from guru limit $awal, $limit");
    } else {
        $result = [];
        echo "<tr><td colspan='8' class='text-center'>Data masih kosong</td></tr>";
    }

    /* This is a search function. */
    if (isset($_POST['cari'])) {
        $keyword = $_POST['keyword'];
        $result = $db->select_data("select * from guru where nama_lengkap like '%$keyword%' or nuptk like '%$keyword%'");
        if (empty($result)) {
            $result = [];
            echo "<tr><td colspan='8' class='text-center'>Data '$keyword' tidak ditemukan</td></tr>";
            die;
        }
        if (empty($keyword)){
            $result = $db->select_data("select * from guru limit $awal, $limit");
        }
    }  

    
    foreach($result as $x):    
	?>
            <tr>
                <td><?php echo $nourut++; ?></td>
                <td><?php echo $x['nuptk']; ?></td>
                <td><?php echo $x['nama_lengkap']; ?></td>
                <td><?php $jk = $x['jenis_kelamin']; 
                if ($jk == 'L') {
                    echo "Laki-laki";
                } else {
                    echo "Perempuan";
                }?></td>
                <td><?php echo $x['alamat']; ?></td>
                <td><?php echo $x['mata_pelajaran']; ?></td>
                <td width="22%" class="content-space-between">
                    <?php include 'guru/modal_detailguru.php'?>
                    <span> </span>
                    <a class="btn btn-sm btn-warning"
                        href="?p=data-guru-edit&id=<?php echo $x['id_guru']; ?>&aksi=edit"><i
                            class="bi bi-pencil-square"></i> Edit</a>

                    <span> </span>
                    <!-- create delete button with alert -->
                    <a class="btn btn-sm btn-danger" href="guru/proses.php?id=<?php echo $x['id_guru']; ?>&aksi=hapus"
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
                            href="?p=data-guru&halaman=<?php echo $halaman_aktif - 1; ?>">Previous</a></li>
                    </li>
                    <?php endif; ?>
                    <!-- create pagination button -->
                    <?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
                    <li class="page-item <?php if ($halaman_aktif == $i) { echo "active"; } ?>">
                        <a class="page-link" href="?p=data-guru&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <!-- create next pagination button -->
                    <?php if ($halaman_aktif < $jumlah_halaman) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?p=data-guru&halaman=<?php echo $halaman_aktif + 1; ?>"
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