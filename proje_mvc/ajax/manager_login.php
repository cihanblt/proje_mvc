<?php
require '../libs/Session.php';
class Manager_Login extends PDO{
	function __construct(){
		parent::__construct('mysql:host=localhost;dbname=site_management', 'root','');
		if($_POST){
			$kadi   = $_POST["kadi"];
			$sifre  = $_POST["sifre"];
			//echo $kadi.$sifre;
			$sor = $this->prepare("SELECT * FROM tbl_Manager WHERE m_username=:kadi AND m_pass=:sifre");
			$sor->execute(array(
					':kadi' => $kadi,
					':sifre' => $sifre
			));
			//echo $sor->rowCount();
			if($sor->rowCount() > 0){
				$sor->setFetchMode(PDO::FETCH_OBJ);
				$get = $sor->fetchAll();
				Session::init();
				Session::set('manager_oturum', TRUE);
				Session::set('kadi', $get[0]->m_username);
				Session::set('adsoyad', $get[0]->m_namesurname);
				Session::set('siteid', $get[0]->m_siteid);
				Session::set('tip', $get[0]->m_type);
				echo 'giris';
			}else{
				echo 'hata';
			}
		}
	}
}
new Manager_Login();
?>