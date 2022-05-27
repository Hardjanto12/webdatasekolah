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
		return $hasil;
	}

} 

 
?>