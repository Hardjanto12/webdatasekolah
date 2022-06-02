<?php 
 
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "tmp_sekolah";
	var $port = "3307";

	var $conn;

	function __construct(){
	$this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db, $this->port);	
	}

	function auth($query){
		$data = mysqli_query($this->conn, $query);
		$hasil = mysqli_num_rows($data);
		return $hasil;
	}

    function select_data($select){
		$data = mysqli_query($this->conn, $select);
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		if (empty($hasil)){
		// pemeriksaan menggunakan fungsi isset()
		$hasil = isset($_POST['hasil']) ? $_POST['hasil'] : '';
		// pemeriksaan menggunakan fungsi empty()
		$hasil = !empty($_POST['hasil']) ? $_POST['hasil'] : '';
		}
		else{
		return $hasil;
		}
	}

	function input($nis, $nama_lengkap, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $notelp, $fotofile, $tahun_lulus)
	{
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$error = $_FILES['foto']['error'];
		$ukuran	= $_FILES['foto']['size'];
		if ($error == 4) {
			echo "Anda belum memilih foto";
			return false;
		}

		$extensiGambarValid = ['jpg','png','jpeg'];
		$extensiGambar = explode('.', $namafoto);
		$extensiGambar = strtolower(end($extensiGambar));
		if (!in_array($extensiGambar, $extensiGambarValid)) {
			echo "File yang anda upload bukan gambar";
			return false;
		}
		if ($ukuran > 1000000) {
			echo "Ukuran gambar terlalu besar";
			return false;
		}
		$namafoto = uniqid();
		$namafoto .= '.';
		$namafoto .= $extensiGambar;
		move_uploaded_file($lokasifoto, '../img/'.$namafoto);
		// end upload pic
		
		// check if the same nis already exist
		$query = "SELECT * FROM siswa WHERE nis = '$nis'";
		$result = mysqli_query($this->conn, $query);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			echo "NIS sudah ada";
			return false;
		}
		
		// insert data to database
		$insert = "INSERT INTO siswa (id_siswa,nis, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, alamat, nama_ayah, nama_ibu, notelp, foto, tahun_lulus) VALUES ('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$nama_ayah', '$nama_ibu', '$notelp', '$namafoto', '$tahun_lulus')";
		$data = mysqli_query($this->conn, $insert);	

		// if success show javascript alert
		if ($data) {
			echo "<script>alert('Data berhasil ditambahkan');</script>";
			return true;
		}
		else{
			echo "<script>alert('Data gagal ditambahkan');</script>";		
			echo mysqli_error($this->conn);
			return false;
		}
	}
	
	function hapus($id){
		// delete old pic file
		$query = "SELECT * FROM siswa WHERE id_siswa = '$id'";
		$result = mysqli_query($this->conn, $query);
		$data = mysqli_fetch_array($result);
		$foto = $data['foto'];
		unlink('../img/'.$foto);		
		mysqli_query($this->conn,"delete from siswa where id_siswa='$id'");
	}

	function getdata_edit($id){
		$data = mysqli_query($this->conn,"select * from siswa where id_siswa='$id'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function update($id ,$nis, $nama_lengkap,$tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $notelp, $fotolama, $foto, $tahun_lulus)
	{
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$error = $_FILES['foto']['error'];
		$ukuran	= $_FILES['foto']['size'];
		
		if ($error == 4) {
			$namafoto = $fotolama;
		}
		else{
			$extensiGambarValid = ['jpg','png','jpeg'];
			$extensiGambar = explode('.', $namafoto);
			$extensiGambar = strtolower(end($extensiGambar));
			if (!in_array($extensiGambar, $extensiGambarValid)) {
				echo "File yang anda upload bukan gambar";
				return false;
			}
			if ($ukuran > 1000000) {
				echo "Ukuran gambar terlalu besar";
				return false;
			}
			$namafoto = uniqid();
			$namafoto .= '.';
			$namafoto .= $extensiGambar;
			
			move_uploaded_file($lokasifoto, '../img/'.$namafoto);
			unlink('../img/'.$fotolama);
		}	
		
		$update = mysqli_query($this->conn,"update siswa set nis='$nis', nama_lengkap='$nama_lengkap',tempat_lahir='$tempat_lahir' , tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', notelp='$notelp', foto='$namafoto', tahun_lulus='$tahun_lulus' where id_siswa='$id'");
		if ($update) {
			echo "<script>alert('Data berhasil diubah');</script>";
			return true;
		}
		else{
			echo "<script>alert('Data gagal diubah');</script>";		
			echo mysqli_error($this->conn);
			return false;
		}
	}

	function addguru( $nip, $nama_lengkap, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $notelp, $mata_pelajaran, $fotofile){
		$fotofile = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$error = $_FILES['foto']['error'];
		$ukuran	= $_FILES['foto']['size'];
		if ($error == 4) {
			echo "Anda belum memilih foto";
			return false;
		}
		
		$extensiGambarValid = ['jpg','png','jpeg'];
		$extensiGambar = explode('.', $fotofile);
		$extensiGambar = strtolower(end($extensiGambar));
		if (!in_array($extensiGambar, $extensiGambarValid)) {
			echo "File yang anda upload bukan gambar";
			return false;
		}
		if ($ukuran > 1000000) {
			echo "Ukuran gambar terlalu besar";
			return false;
		}
		$namafoto = uniqid();
		$namafoto .= '.';
		$namafoto .= $extensiGambar;
		move_uploaded_file($lokasifoto, '../img/'.$namafoto);
		// end upload pic

		// check if the same nip already exist
		$select = "SELECT * FROM guru WHERE nip = '$nip'";
		$data = mysqli_query($this->conn, $select);
		$d = mysqli_fetch_array($data);
		if ($d['nip'] == $nip) {
			echo "<script>alert('NIP sudah ada');</script>";
			return false;
		}
		// end check
		$insert = "INSERT INTO `guru` (`id_guru`, `nama_lengkap`, `nip`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `notelp`, `mata_pelajaran`, `foto`, `created_time`) VALUES ('', '$nama_lengkap' , '$nip', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$notelp', '$mata_pelajaran', '$namafoto', current_timestamp())";
		$data = mysqli_query($this->conn, $insert);
		// if success show javascript alert
		if ($data) {
			echo "<script>alert('Data berhasil ditambahkan');</script>";
			return true;
		}
		else{
			echo "<script>alert('Data gagal ditambahkan');</script>";
			echo mysqli_error($this->conn);
			return false;
		}

	}

	function editguru($id,$nip,$nama_lengkap,$tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $notelp, $mata_pelajaran, $fotolama, $foto)
	{
		if ($foto == NULL) {
			$namafoto = $fotolama;
		}
		else{
			$fotofile = $_FILES['foto']['name'];
			$lokasifoto = $_FILES['foto']['tmp_name'];
			$error = $_FILES['foto']['error'];
			$ukuran	= $_FILES['foto']['size'];
			
			if ($error == 4) {
				$namafoto = $fotolama;
			}
			else{
				$extensiGambarValid = ['jpg','png','jpeg'];
				$extensiGambar = explode('.', $fotofile);
				$extensiGambar = strtolower(end($extensiGambar));
				if (!in_array($extensiGambar, $extensiGambarValid)) {
					echo "File yang anda upload bukan gambar";
					return false;
				}
				if ($ukuran > 1000000) {
					echo "Ukuran gambar terlalu besar";
					return false;
				}
				$namafoto = uniqid();
				$namafoto .= '.';
				$namafoto .= $extensiGambar;
				
				move_uploaded_file($lokasifoto, '../img/'.$namafoto);
				unlink('../img/'.$fotolama);
			}	
		}
		$edit = mysqli_query($this->conn,"update guru set nip='$nip', nama_lengkap='$nama_lengkap',tempat_lahir='$tempat_lahir' , tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', notelp='$notelp', mata_pelajaran='$mata_pelajaran', foto='$namafoto' where id_guru='$id'");

		if ($edit) {
			echo "<script>alert('Data berhasil diubah');</script>";
		}
		else{
			echo "<script>alert('Data gagal diubah');</script>";
		}
	}

	function hapusguru($id){
		$select = "SELECT * FROM guru WHERE id_guru = '$id'";
		$data = mysqli_query($this->conn, $select);
		$d = mysqli_fetch_array($data);
		$fotolama = $d['foto'];
		unlink('../img/'.$fotolama);
		mysqli_query($this->conn, "delete from guru where id_guru = '$id'");
	}

	function getguru_edit($id){
		$data = mysqli_query($this->conn,"select * from guru where id_guru='$id'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
} 

 
?>