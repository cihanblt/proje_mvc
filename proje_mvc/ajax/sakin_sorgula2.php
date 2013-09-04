<?php
class Sakin_Sorgula2 extends PDO{
	function __construct(){
		parent::__construct("mysql:host=localhost;dbname=site_management","root","");

		if($_POST){
			header("Content-type:text/html; Charset:iso-8859-9");
			$h_blokid   = $_POST["h_blokid"];
			$h_houseid  = $_POST["h_houseid"];
			$h_hostid   = $_POST["h_hostid"];
			
			$sor = $this->prepare("SELECT * FROM tbl_House WHERE h_blokid=$h_blokid AND id=$h_houseid");
			$sor->execute();
			$get = $sor->fetch();
			if($get["h_status"] > 1){
				echo  "hata";
			}else{
				echo "ok";
			}
		}
	}
}
new Sakin_Sorgula2();
?>