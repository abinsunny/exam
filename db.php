<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class database{
	var $con,$q;
	function __construct(){
		$this->con=mysqli_connect('localhost:3308','root','','white_rabbit_test');
	}
	function insertData($data,$file_url){
		extract($data);
		$file_last_update=time();
		$this->q=mysqli_query($this->con,"INSERT INTO file_log (file_title,file_description,file_url,file_last_update) VALUES('".addslashes($file_title)."','".addslashes($file_description)."','$file_url','$file_last_update')");
	}
	function listFileTable($condition){
		$this->q=mysqli_query($this->con,"SELECT * from file_log ".$condition);
		return $this->q;
	}
	function listFileTableTotalCount($condition){
		$this->q=mysqli_query($this->con,"SELECT COUNT(*) as Count from file_log ".$condition);
		$row = mysqli_fetch_assoc($this->q);
		return $row['Count'];
	}
	function deleteFile($file_id){
		$file_last_update=time();
		$this->q=mysqli_query($this->con,"UPDATE file_log SET file_isdeleted='1', file_last_update='$file_last_update' WHERE file_id='$file_id'");
		return $this->q;
	}
}

?>