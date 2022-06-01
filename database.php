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

	function input($nis, $nama_lengkap, $tgl_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $notelp, $fotofile, $tahun_lulus)
	{
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$error = $_FILES['foto']['error'];
		$ukuran	= $_FILES['foto']['size'];
		if ($error == 4) {
			echo "Anda belum memilih foto";
			return false;
		}
		
		if ($tahun_lulus == "") {
			$tahun_lulus = NULL;
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
		$select = "SELECT * FROM siswa WHERE nis = '$nis'";
		$data = mysqli_query($this->conn, $select);
		$d = mysqli_fetch_array($data);
		if ($d['nis'] == $nis) {
			echo "<script>alert('NIS sudah ada');</script>";
			return false;
		}
		// end check
		mysqli_query($this->conn, "insert into siswa values('','$nis','$nama_lengkap','$tgl_lahir','$jenis_kelamin','$alamat','$nama_ayah','$nama_ibu','$notelp','$namafoto','$tahun_lulus')");
	}
	
	function hapus($id){
		mysqli_query($this->conn,"delete from siswa where id_siswa='$id'");
	}

	function getdata_edit($id){
		$data = mysqli_query($this->conn,"select * from siswa where id_siswa='$id'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function update($id ,$nis, $nama_lengkap, $tgl_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $notelp, $fotolama, $foto, $tahun_lulus)
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
		
		mysqli_query($this->conn,"update siswa set nis='$nis', nama_lengkap='$nama_lengkap', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', notelp='$notelp', foto='$namafoto', tahun_lulus='$tahun_lulus' where id_siswa='$id'");
	}
} 

 
?>