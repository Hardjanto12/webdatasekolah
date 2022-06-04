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

	function input($nipd, $nama_lengkap, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $notelp, $tahun_lulus)
	{
		
		// check if the same nipd already exist
		$query = "SELECT * FROM siswa WHERE nipd = '$nipd'";
		$result = mysqli_query($this->conn, $query);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			echo "NIPD sudah ada";
			return false;
		}
		
		// insert data to database
		$insert = "INSERT INTO siswa (id_siswa,nipd, nama_lengkap, tempat_lahir, tgl_lahir, jenis_kelamin, alamat, nama_ayah, nama_ibu, notelp, tahun_lulus) VALUES ('', '$nipd', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$nama_ayah', '$nama_ibu', '$notelp', '$tahun_lulus')";
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
		mysqli_query($this->conn,"delete from siswa where id_siswa='$id'");
	}

	function getdata_edit($id){
		$data = mysqli_query($this->conn,"select * from siswa where id_siswa='$id'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function update($id ,$nipd, $nama_lengkap,$tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $notelp, $tahun_lulus)
	{
			$update = mysqli_query($this->conn,"update siswa set nipd='$nipd', nama_lengkap='$nama_lengkap',tempat_lahir='$tempat_lahir' , tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', notelp='$notelp',tahun_lulus='$tahun_lulus' where id_siswa='$id'");
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

	function addguru( $nuptk, $nama_lengkap, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $notelp, $mata_pelajaran){

		// check if the same nuptk already exist
		$select = "SELECT * FROM guru WHERE nuptk = '$nuptk'";
		$data = mysqli_query($this->conn, $select);
		$d = mysqli_fetch_array($data);
		if ($d['nuptk'] == $nuptk) {
			echo "<script>alert('NUPTK sudah ada');</script>";
			return false;
		}
		// end check
		$insert = "INSERT INTO `guru` (`id_guru`, `nama_lengkap`, `nuptk`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `notelp`, `mata_pelajaran`, `created_time`) VALUES ('', '$nama_lengkap' , '$nuptk', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$notelp', '$mata_pelajaran', current_timestamp())";
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

	function editguru($id,$nuptk,$nama_lengkap,$tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $notelp, $mata_pelajaran)
	{
		
		$edit = mysqli_query($this->conn,"update guru set nuptk='$nuptk', nama_lengkap='$nama_lengkap',tempat_lahir='$tempat_lahir' , tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', notelp='$notelp', mata_pelajaran='$mata_pelajaran' where id_guru='$id'");

		if ($edit) {
			echo "<script>alert('Data berhasil diubah');</script>";
		}
		else{
			echo "<script>alert('Data gagal diubah');</script>";
		}
	}

	function hapusguru($id){
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