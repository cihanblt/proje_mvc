<?php
class Sakin_Sorgula extends PDO{
	function __construct(){
		parent::__construct("mysql:host=localhost;dbname=site_management","root","");
		if($_POST){
			header("Content-type:text/html; Charset:iso-8859-9");
			$r_username = $_POST["r_username"];
			$r_tcnumber = $_POST["r_tcnumber"];
			$r_email    = $_POST["r_email"];
			$h_blokid   = $_POST["h_blokid"];
			$h_houseid  = $_POST["h_houseid"];
			
				$sor = $this->prepare("SELECT * FROM tbl_Resident WHERE r_username='$r_username' OR r_tcnumber='$r_tcnumber' OR r_email='$r_email'");
				$sor->execute();
					if($sor->rowCount() > 0){
						echo "hata";
					}else{
						$sor2 = $this->prepare("SELECT * FROM tbl_House WHERE h_blokid=$h_blokid AND id=$h_houseid");
						$sor2->execute();
						$get = $sor2->fetch();
							if($get["h_status"] > 1){
								echo "hata2";
							}else{
								echo 'ok';
							}
					}

		}
	}
}
new Sakin_Sorgula();
?>