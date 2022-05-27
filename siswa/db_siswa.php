<?php 
 
class dbsiswa{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "tmp_sekolah";
	var $port = "3307";
	

	var $conn;

	function __construct(){
	$this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db, $this->port);	
	}

    function select_data($select){
		$data = mysqli_query($this->conn, $select);
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function tampil_data(){
		$data = mysqli_query($this->conn, "select * from admin");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function input($username,$password){
		$pwd = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($this->conn, "INSERT INTO admin (username, password) VALUES ( '$username', '$pwd')");
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

	function update($id,$username,$password){
		mysqli_query($this->conn,"UPDATE admin SET username='$username', password='$password' WHERE id_admin='$id'");
	}
    
} 

 
?>