<?php

class Manager extends Controllers {
	function __construct(){
		parent::__construct();
		Session::init();
		if(Session::get('manager_oturum') == FALSE){
			Session::destroy();
			header("Location: index");
		}else{
			
		}
	}
	
	function index(){
		$siteid = Session::get("siteid");
		$this->view->siteid = $siteid;
		$this->view->tip = Session::get("tip");
		$this->view->de = "deneme";
		$this->view->m_sitelist = $this->model->listele("SELECT * FROM tbl_site WHERE id=".$siteid);
		
		if(count($this->view->m_sitelist) > 0){
			$this->view->gelir_alt_menu = $this->model->listele("SELECT * FROM tbl_GelirIslemleri");
			$this->view->render("manager/header");
			$do = @$_GET["do"];
			$liste = 15;
			switch ($do){
				//////////////////BLOK ÝÞLEMLERÝ////////////////////////////
				case "blok_islemleri":
					$s = @$_GET["s"];
					
					$kayit_sayisi = count($this->model->listele("SELECT b.b_name,b.b_siteid,b.id,s.s_name FROM tbl_Blok b  
																 LEFT JOIN tbl_site s ON s.id = b.b_siteid 
																 WHERE s.id =".$siteid));
					$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
					if(isset($_GET["s"])){
						$baslangic = $s * $liste - $liste;
					}else{
						$baslangic = 1 * $liste - $liste;
					}
					$this->view->liste = $this->model->listele("SELECT b.b_name,b.b_siteid,b.id,s.s_name FROM tbl_blok b  
																LEFT JOIN tbl_site s ON s.id = b.b_siteid 
																WHERE s.id = $siteid  ORDER BY id DESC LIMIT $baslangic,$liste");
					$this->view->render("manager/".$do);
				break;
				case "blok_kaydet":
					if($_POST){
						$b_name = $_POST["b_name"];
						$ekle = $this->model->kaydet("INSERT INTO tbl_Blok VALUES (null,'$b_name',$siteid)");
						$url = $_SERVER["HTTP_REFERER"];
						header("Location:$url");
					}
					
				break;
				
				case "blok_guncelle":
					$id = $_GET["id"];
					
					if($_POST){
						$b_name = $_POST["b_name"];
						
						$guncelle = $this->model->guncelle("UPDATE tbl_Blok SET b_name='$b_name' WHERE id=$id");
						$url = $_SERVER["HTTP_REFERER"];
						header("Location:$url");
					}else{
						//echo '<script type="text/javascript">alert('.$b_name.')</script>';
					}
				break;
				
				case "blok_sil":
					$id = $_GET["id"];
					$sil = $this->model->sil("DELETE FROM tbl_Blok WHERE id=".$id);
					$url = $_SERVER["HTTP_REFERER"];
					header("Location:$url");
				break;
				////////////////////////#BLOK ÝÞLEMLERÝ//////////////////////////////////////
				
				////////////////////////DAÝRE ÝÞLEMLERÝ///////////////////////////////////////
				case "daire_islemleri":
					$s = @$_GET["s"];
					switch(@$_GET["mdl"]){
						case "ara":
							if($_POST){
								$h_blokid = $_POST["h_blokid"];
								$h_number = $_POST["h_number"];
								$sql = "SELECT h.id,h.h_name,h.h_number,dk.ozellik_adi,h.h_property,h.h_propertytype,b.id AS 'bid',b.b_name,h.h_status,hs.house_status FROM tbl_House h
										LEFT JOIN tbl_Site s ON s.id = h.h_siteid
										LEFT JOIN tbl_Blok b ON b.id = h.h_blokid
										LEFT JOIN tbl_HouseStatus hs ON hs.id = h.h_status
										LEFT JOIN tbl_DaireOzellik dk ON dk.id = h.h_propertytype
										WHERE h.h_siteid = $siteid ";
									if(!empty($h_blokid)){
										$sql .= "AND h.h_blokid=$h_blokid ";
									}
									if(!empty($h_number)){
										$sql .= "AND h.h_number=$h_number ";
									}
									$this->view->sql = $sql;
								$kayit_sayisi = count($this->model->listele($sql));
								$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
								if(isset($_GET["s"])){
									$baslangic = $s * $liste - $liste;
								}else{
									$baslangic = 1 * $liste - $liste;
								}
								$this->view->liste = $this->model->listele($sql." ORDER BY id DESC LIMIT $baslangic,$liste ");
								$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
								$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
								$this->view->render("manager/".$do);
							}
						break;
						
						default:
							
								$kayit_sayisi = count($this->model->listele("SELECT h.id,h.h_name,h.h_number,dk.ozellik_adi,h.h_property,h.h_propertytype,b.id AS 'bid',b.b_name,h.h_status,hs.house_status FROM tbl_House h
										LEFT JOIN tbl_Site s ON s.id = h.h_siteid
										LEFT JOIN tbl_Blok b ON b.id = h.h_blokid
										LEFT JOIN tbl_HouseStatus hs ON hs.id = h.h_status
										LEFT JOIN tbl_DaireOzellik dk ON dk.id = h.h_propertytype
										WHERE h.h_siteid = $siteid"));
								$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
								if(isset($_GET["s"])){
									$baslangic = $s * $liste - $liste;
								}else{
									$baslangic = 1 * $liste - $liste;
								}
								$this->view->liste = $this->model->listele("SELECT h.id,h.h_name,h.h_number,dk.ozellik_adi,h.h_property,h.h_propertytype,b.id AS 'bid',b.b_name,h.h_status,hs.house_status FROM tbl_House h
										LEFT JOIN tbl_Site s ON s.id = h.h_siteid
										LEFT JOIN tbl_Blok b ON b.id = h.h_blokid
										LEFT JOIN tbl_HouseStatus hs ON hs.id = h.h_status
										LEFT JOIN tbl_DaireOzellik dk ON dk.id = h.h_propertytype
										WHERE h.h_siteid = $siteid  ORDER BY id DESC LIMIT $baslangic,$liste ");
								$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
								$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
								$this->view->d_ozellik = $this->model->listele("SELECT * FROM tbl_DaireOzellik");
								$this->view->render("manager/".$do);
						break;
					}

					
				break;
				
				case "daire_kaydet":
					if($_POST){
						$h_name        = $_POST["h_name"];
						$h_number      = $_POST["h_number"];
						$h_properttype = $_POST["h_properttype"];
						$h_property    = $_POST["h_property"];
						$h_blokid      = $_POST["h_blokid"];
						$h_status      = $_POST["h_status"];
						$ekle = $this->model->kaydet("INSERT INTO tbl_House VALUES(null,'$h_name',$h_number,$h_properttype,'$h_property',$siteid,$h_blokid,$h_status)");
						$url = $_SERVER["HTTP_REFERER"];
						header("Location:$url");
					}
				break;
				case "daire_guncelle":
					if($_POST){
						$id       = $_GET["id"];
						$h_name   = $_POST["h_name"];
						$h_number = $_POST["h_number"];
						$h_propertytype = $_POST["h_propertytype"];
						$h_property    = $_POST["h_property"];
						$h_blokid = $_POST["h_blokid"];
						$h_status = $_POST["h_status"];
						$guncelle = $this->model->guncelle("UPDATE tbl_House SET h_name='$h_name',h_number=$h_number,h_propertytype=$h_propertytype,h_property='$h_property',h_blokid=$h_blokid,h_status=$h_status WHERE id=$id");
						$url =  $_SERVER["HTTP_REFERER"];
						header("Location:$url");
					}	
				break;
				
				case "daire_sil":
					$id = $_GET["id"];
					$sil = $this->model->sil("DELETE FROM tbl_House WHERE id=$id");
					$url =  $_SERVER["HTTP_REFERER"];
					header("Location:$url");
				break;
				///////////////////////#DAÝRE ÝÞLEMLERÝ////////////////////////////////
				
				//////////////////////EV SAHÝBÝ ÝÞLEMLERÝ//////////////////////////////
				case "ev_sahibi_islemleri":
					$s = @$_GET["s"];
					switch(@$_GET["mdl"]){
						case "ara":
							if($_POST){
								$h_blokid = $_POST["h_blokid"];
								$h_houseid = $_POST["h_houseid"];
								$h_namesurname = $_POST["h_namesurname"];
								$h_email = $_POST["h_email"];
									$sql = "SELECT h.id,b.id as 'bid',h.h_tcnumber,h.h_username,h.h_namesurname,h.h_phone,h.h_gsmphone,h.h_email,h.h_adress,b.b_name,he.h_number,hs.house_status FROM tbl_Host h
											LEFT JOIN tbl_Site s ON s.id = h.h_siteid
											LEFT JOIN tbl_Blok b ON b.id = h.h_blokid
											LEFT JOIN tbl_House he ON he.id = h.h_houseid
											LEFT JOIN tbl_HouseStatus hs ON hs.id = he.h_status						
											WHERE h.h_siteid = $siteid ";
									if(!empty($h_blokid)){
										$sql .= "AND h.h_blokid = $h_blokid ";
									}
									if(!empty($h_houseid)){
										$sql .= "AND he.id = $h_houseid ";
									}
									if(!empty($h_namesurname)){
										$sql .= "AND h.h_namesurname='$h_namesurname' ";
									}
									if(!empty($h_email)){
										$sql .= "AND h.h_email='$h_email'";
									}
									$this->view->sql = $sql; 	
								$this->view->h_blokid = $h_blokid;
								$kayit_sayisi = count($this->model->listele($sql));
								$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
								if(isset($_GET["s"])){
									$baslangic = $s * $liste - $liste;
								}else{
									$baslangic = 1 * $liste - $liste;
								}
								$this->view->liste = $this->model->listele($sql." ORDER BY h.id DESC LIMIT $baslangic,$liste ");
								$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
								$this->view->il_list = $this->model->listele("SELECT * FROM tbl_City");
								$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
								$this->view->render("manager/".$do);
							}
						break;
					
						default:
								
							$kayit_sayisi = count($this->model->listele("SELECT h.id,b.id as 'bid',h.h_tcnumber,h.h_username,h.h_namesurname,h.h_phone,h.h_gsmphone,h.h_email,h.h_adress,b.b_name,he.h_number,hs.house_status FROM tbl_Host h
																		LEFT JOIN tbl_Site s ON s.id = h.h_siteid
																		LEFT JOIN tbl_Blok b ON b.id = h.h_blokid
																		LEFT JOIN tbl_House he ON he.id = h.h_houseid
																		LEFT JOIN tbl_HouseStatus hs ON hs.id = he.h_status
																		WHERE h.h_siteid = $siteid"));
							$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
							if(isset($_GET["s"])){
								$baslangic = $s * $liste - $liste;
							}else{
								$baslangic = 1 * $liste - $liste;
							}
							$this->view->liste = $this->model->listele("SELECT h.id,b.id as 'bid',h.h_tcnumber,h.h_username,h.h_namesurname,h.h_phone,h.h_gsmphone,h.h_email,h.h_adress,b.b_name,he.h_number,hs.house_status FROM tbl_Host h
																		LEFT JOIN tbl_Site s ON s.id = h.h_siteid
																		LEFT JOIN tbl_Blok b ON b.id = h.h_blokid
																		LEFT JOIN tbl_House he ON he.id = h.h_houseid
																		LEFT JOIN tbl_HouseStatus hs ON hs.id = he.h_status
																		WHERE h.h_siteid = $siteid  
																		ORDER BY id DESC LIMIT $baslangic,$liste ");
							$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
							$this->view->il_list = $this->model->listele("SELECT * FROM tbl_City");
							$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
							$this->view->render("manager/".$do);
							break;
					}
						
				break;
				case "ev_sahibi_kaydet":
					if($_POST){	
					header("Content-type:text/html; Charset=iso-8859-9");
					//iconv("UTF-8", "ISO-8859-9", $_POST['hk']);
					$h_username     = iconv("UTF-8", "ISO-8859-9",$_POST["h_username"]);
					$h_pass         = iconv("UTF-8", "ISO-8859-9",$_POST["h_pass"]);
					$h_tcnumber     = iconv("UTF-8", "ISO-8859-9",$_POST["h_tcnumber"]);
					$h_namesurname  = iconv("UTF-8", "ISO-8859-9",$_POST["h_namesurname"]);
					$h_phone        = iconv("UTF-8", "ISO-8859-9",$_POST["h_phone"]);
					$h_gsmphone     = iconv("UTF-8", "ISO-8859-9",$_POST["h_gsmphone"]);
					$h_email        = iconv("UTF-8", "ISO-8859-9",$_POST["h_email"]);
					$h_birthplace   = iconv("UTF-8", "ISO-8859-9",$_POST["h_birthplace"]);
					$h_birthdate    = iconv("UTF-8", "ISO-8859-9",$_POST["h_birthday"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["h_birthmonth"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["r_birthyear"]);
					$h_blokid       = iconv("UTF-8", "ISO-8859-9",$_POST["h_blokid"]);
					$h_houseid      = iconv("UTF-8", "ISO-8859-9",$_POST["h_houseid"]);
					$h_adress       = iconv("UTF-8", "ISO-8859-9",$_POST["h_adress"]);
				
					$kaydet = $this->model->kaydet("INSERT INTO tbl_Host VALUES (null,'$h_username','$h_pass','$h_tcnumber ','$h_namesurname','$h_phone','$h_gsmphone','$h_email','$h_birthplace','$h_birthdate',$siteid,$h_blokid,$h_houseid,'$h_adress')");
					}
					//$url = $_SERVER["HTPP_REFERER"];
						
				break;
				
				case "ev_sahibi_guncelle":
					if($_POST){
						$id = $_GET["id"];
						header("Content-type:text/html; Charset=iso-8859-9");
						$h_username     = iconv("UTF-8", "ISO-8859-9",$_POST["h_username"]);
						$h_pass         = iconv("UTF-8", "ISO-8859-9",$_POST["h_pass"]);
						$h_tcnumber     = iconv("UTF-8", "ISO-8859-9",$_POST["h_tcnumber"]);
						$h_namesurname  = iconv("UTF-8", "ISO-8859-9",$_POST["h_namesurname"]);
						$h_phone        = iconv("UTF-8", "ISO-8859-9",$_POST["h_phone"]);
						$h_gsmphone     = iconv("UTF-8", "ISO-8859-9",$_POST["h_gsmphone"]);
						$h_email        = iconv("UTF-8", "ISO-8859-9",$_POST["h_email"]);
						$h_birthplace   = iconv("UTF-8", "ISO-8859-9",$_POST["h_birthplace"]);
						$h_birthdate    = iconv("UTF-8", "ISO-8859-9",$_POST["h_birthday"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["h_birthmonth"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["h_birthyear"]);
						$h_blokid       = iconv("UTF-8", "ISO-8859-9",$_POST["h_blokid"]);
						$h_houseid      = iconv("UTF-8", "ISO-8859-9",$_POST["h_houseid"]);
						$h_adress       = iconv("UTF-8", "ISO-8859-9",$_POST["h_adress"]);
						
						$sql = "UPDATE tbl_Host SET h_username='$h_username',h_pass='$h_pass',h_tcnumber='$h_tcnumber',h_namesurname='$h_namesurname',h_phone='$h_phone',h_gsmphone='$h_gsmphone',h_email='$h_email',h_birthplace='$h_birthplace',h_birthdate='$h_birthdate' ,h_blokid=$h_blokid,h_houseid=$h_houseid,h_adress='$h_adress' WHERE id=$id";
						$kaydet = $this->model->guncelle($sql);
						
						$this->view->sql = $sql;
					}
					$this->view->render("manager/bos");
				break;
				
				case "ev_sahibi_sil":
					if($_GET){
						$id = $_GET["id"];
						$this->model->sil("DELETE FROM tbl_Host WHERE id=$id");
						$url = $_SERVER["HTTP_REFERER"];
						header("Location: $url");
					}
				break;
				//////////////////////#EV SAHÝBÝ ÝÞLEMLERÝ/////////////////////////////
				
				//////////////////////APARTMAN SAKÝNÝ ÝÞLEMLERÝ/////////////////////////////
				case "sakin_islemleri":
					$s = @$_GET["s"];
					$mdl = @$_GET["mdl"];
					
					$this->view->blok_list = $this->model->listele("SELECT * FROM tbl_Blok WHERE b_siteid=$siteid");
					$this->view->il_list   = $this->model->listele("SELECT * FROM tbl_City");
					
					switch($mdl){
						case "detay":
							$id = $_GET["id"];
							$sql_resident = "SELECT r.id,r.r_tcnumber,r.r_namesurname,r.r_phone,r.r_gsmphone,
										  	 r.r_email,c.city_name,r.r_birthdate,r.r_status,b.b_name,he.h_number,
											 ho.h_tcnumber,ho.h_namesurname,ho.h_phone,ho.h_gsmphone,ho.h_email,
											 c2.city_name AS 'city_name_h',ho.h_birthdate,ho.h_adress
											 FROM tbl_Resident r
											 LEFT JOIN tbl_Blok b ON b.id = r.r_blokid
											 LEFT JOIN tbl_House he ON he.id = r.r_houseid
											 LEFT JOIN tbl_Host ho ON ho.id = r.r_hostid
											 LEFT JOIN tbl_City c ON c.id = r.r_birthplace 
											 LEFT JOIN tbl_City c2 ON c2.id = ho.h_birthplace
											 WHERE r.id=$id";
							$this->view->liste = $this->model->listele($sql_resident);
							$this->view->render("manager/sakin_detay");
						break;
						
						case "ara":
							if($_POST){
								$r_tcnumber     = $_POST["r_tcnumber"];
								$h_blokid       = $_POST["h_blokid"];
								$h_houseid      = $_POST["h_houseid"];
								$r_namesurname  = $_POST["r_namesurname"];
								$r_email        = $_POST["r_email"];
								$sql = "SELECT r.id,r.r_username,r.r_tcnumber,r.r_namesurname,r.r_phone,r.r_gsmphone,r.r_email,r.r_birthplace,r.r_birthdate,r.r_hostid,r.r_status,b.id AS 'bid',b.b_name,he.id AS 'heid',he.h_number,he.h_status 
										FROM tbl_Resident r
										LEFT JOIN tbl_Blok b ON b.id = r.r_blokid
										LEFT JOIN tbl_House he ON he.id = r.r_houseid WHERE r.r_siteid = $siteid ";
								if(!empty($r_tcnumber)){
									$sql .= "AND r.r_tcnumber='$r_tcnumber'";
								}
								if(!empty($h_blokid)){
									$sql .= "AND b.id='$h_blokid'";
								}
								if(!empty($h_houseid)){
									$sql .= "AND he.id='$h_houseid'";
								}
								if(!empty($r_namesurname)){
									$sql .= "AND r.r_namesurname='$r_namesurname'";
								}
								if(!empty($r_email)){
									$sql .= "AND r.r_email='$r_email'";
								}
								$kayit_sayisi = count($this->model->listele($sql));
								$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
								if(isset($_GET["s"])){
									$baslangic = $s * $liste - $liste;
								}else{
									$baslangic = 1 * $liste - $liste;
								}
								$this->view->liste = $this->model->listele($sql." ORDER BY id DESC LIMIT $baslangic,$liste ");
								$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
								$this->view->il_list = $this->model->listele("SELECT * FROM tbl_City");
								$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
								$this->view->render("manager/".$do);
							}
						break;
						
						default:
							$sql = "SELECT r.id,r.r_username,r.r_tcnumber,r.r_namesurname,r.r_phone,r.r_gsmphone,r.r_email,r.r_birthplace,r.r_birthdate,r.r_hostid,r.r_status,b.id AS 'bid',b.b_name,he.id AS 'heid',he.h_number,he.h_status 
									FROM tbl_Resident r
									LEFT JOIN tbl_Blok b ON b.id = r.r_blokid
									LEFT JOIN tbl_House he ON he.id = r.r_houseid";
							$kayit_sayisi = count($this->model->listele($sql." WHERE r.r_siteid = $siteid"));
							$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
							if(isset($_GET["s"])){
								$baslangic = $s * $liste - $liste;
							}else{
								$baslangic = 1 * $liste - $liste;
							}
							$this->view->liste = $this->model->listele($sql." WHERE r.r_siteid = $siteid  
																		ORDER BY id DESC LIMIT $baslangic,$liste ");
							$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
							$this->view->il_list = $this->model->listele("SELECT * FROM tbl_City");
							$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
							$this->view->render("manager/".$do);
							
						break;
					}
					
					
				break;
				
				case "sakin_cikis":
					if($_POST){
						$id = $_GET["id"];
						try{
						$out_date = $_POST["output_date"];
						$sql_up_outdate = "UPDATE tbl_InOut SET out_date='$out_date' WHERE residentid=$id"; 
						$this->model->guncelle($sql_up_outdate);
						$get = $this->model->listele("SELECT id,r_houseid FROM tbl_Resident WHERE id=$id");
						$h_houseid = $get[0]["r_houseid"]; 
						$sql_up = "UPDATE tbl_House SET h_status=1 WHERE id=$h_houseid";
						$this->model->guncelle($sql_up);
						$sil = $this->model->sil("DELETE FROM tbl_Resident WHERE id=$id");
						$url = $_SERVER["HTTP_REFERER"];
						header("Location: $url");
						
						}catch(PDOException $e){
							$this->view->error = $e->getMessage();
						}
					}
				break;
				
				case "sakin_sil":
					if($_GET){
						$id = $_GET["id"];
						try{
						$get = $this->model->listele("SELECT id,r_houseid FROM tbl_Resident WHERE id=$id");
						$h_houseid = $get[0]["r_houseid"]; 
						$sql_up = "UPDATE tbl_House SET h_status=1 WHERE id=$h_houseid";
						$this->model->guncelle($sql_up);
						$sil = $this->model->sil("DELETE FROM tbl_Resident WHERE id=$id");
						$url = $_SERVER["HTTP_REFERER"];
						header("Location: $url");
						
						}catch(PDOException $e){
							$this->view->error = $e->getMessage();
						}
						
					}
				break;
				
				case "sakin_kaydet":
					if($_POST){
						$r_type = $_POST["r_type"];
						if($r_type == 0){  //kiracý kaydet
							header("Content-type:text/html; Charset=iso-8859-9");
							$input_date    = iconv("UTF-8", "ISO-8859-9",$_POST["input_date"]);
							$r_username    = iconv("UTF-8", "ISO-8859-9",$_POST["r_username"]);
							$r_pass        = iconv("UTF-8", "ISO-8859-9",$_POST["r_pass"]);
							$r_tcnumber    = iconv("UTF-8", "ISO-8859-9",$_POST["r_tcnumber"]);
							$r_namesurname = iconv("UTF-8", "ISO-8859-9",$_POST["r_namesurname"]);
							$r_phone       = iconv("UTF-8", "ISO-8859-9",$_POST["r_phone"]);
							$r_gsmphone    = iconv("UTF-8", "ISO-8859-9",$_POST["r_gsmphone"]);
							$r_email       = iconv("UTF-8", "ISO-8859-9",$_POST["r_email"]);
							$r_birthplace  = iconv("UTF-8", "ISO-8859-9",$_POST["r_birthplace"]);
							$r_birthdate   = iconv("UTF-8", "ISO-8859-9",$_POST["r_birthday"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["r_birthmonth"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["r_birthyear"]);
							$h_blokid      = $_POST["h_blokid"];
							$h_houseid     = $_POST["h_houseid"];
							$h_hostid      = $_POST["h_hostid"];
							$r_regdate     = date("d.m.Y H:i");
							$r_status      = 0;
							$sql_ins = "INSERT INTO tbl_Resident VALUES(NULL,'$r_username','$r_pass','$r_tcnumber','$r_namesurname','$r_phone','$r_gsmphone','$r_email','$r_birthplace','$r_birthdate',$siteid,$h_blokid,$h_houseid,$h_hostid,'$r_regdate',$r_status)";
						    $get_id = $this->model->kaydet($sql_ins);
							$residentid = $get_id;
							//$this->view->error = $kiraci['id'];
							$sql_up = "UPDATE tbl_House SET h_status=2 WHERE id=$h_houseid";
							$this->model->guncelle($sql_up);
							
							
							try{
								$sql_inout = "INSERT INTO tbl_InOut VALUES(
								NULL,'$input_date','','$r_tcnumber','$r_namesurname',
								'$r_phone','$r_gsmphone','$r_email','$r_birthplace','$r_birthdate'
								,$siteid,$h_blokid,$h_houseid,$h_hostid,'$residentid','$r_regdate')";
								$inout = $this->model->kaydet($sql_inout);
							}catch(PDOException $e){
								//$this->view->error = $e->getMessage();
								//echo $this->view->error;
							}
								//echo $this->view->error;
							//$_url = $_SERVER["HTTP_REFERER"];
							//header("Location: $url");
						}
					
						
						if($r_type == 1){ //ev sahibi kaydet
							header("Content-type:text/html; Charset=iso-8859-9");
							$h_hostid      = $_POST["h_hostid"];
							$host_get      = $this->model->listele("SELECT * FROM tbl_Host WHERE id=$h_hostid");
							$input_date    = iconv("UTF-8", "ISO-8859-9",$_POST["input_date"]);
							$r_username    = $host_get[0]["h_username"];
							$r_pass        = $host_get[0]["h_pass"];
							$r_tcnumber    = $host_get[0]["h_tcnumber"];
							$r_namesurname = $host_get[0]["h_namesurname"];
							$r_phone       = $host_get[0]["h_phone"];
							$r_gsmphone    = $host_get[0]["h_gsmphone"];
							$r_email       = $host_get[0]["h_email"];
							$r_birthplace  = $host_get[0]["h_birthplace"];
							$r_birthdate   = $host_get[0]["h_birthdate"];
							$h_blokid      = $_POST["h_blokid"];
							$h_houseid     = $_POST["h_houseid"];
							
							$r_regdate     = date("d.m.Y H:i");
							$r_status      = 1;
							
							$sql_ins = "INSERT INTO tbl_Resident VALUES(NULL,'$r_username','$r_pass','$r_tcnumber','$r_namesurname','$r_phone','$r_gsmphone','$r_email','$r_birthplace','$r_birthdate',$siteid,$h_blokid,$h_houseid,$h_hostid,'$r_regdate',$r_status)";
							$get_id = $this->model->kaydet($sql_ins);
							$residentid = $get_id;
							$sql_up = "UPDATE tbl_House SET h_status=2 WHERE id=$h_houseid";
							$this->model->guncelle($sql_up);
							
							try{
								$sql_inout = "INSERT INTO tbl_InOut VALUES(
								NULL,'$input_date','','$r_tcnumber','$r_namesurname',
								'$r_phone','$r_gsmphone','$r_email','$r_birthplace','$r_birthdate'
								,$siteid,$h_blokid,$h_houseid,$h_hostid,'$residentid','$r_regdate')";
								$inout = $this->model->kaydet($sql_inout);
							}catch(PDOException $e){
								$this->view->error = $e->getMessage();
								echo $this->view->error;
							}
								echo $this->view->error;
						}
					}
				break;
				
				case "sakin_guncelle":
					if($_POST){
					    $id = $_GET["id"];
						$r_username    = iconv("UTF-8", "ISO-8859-9",$_POST["r_username"]);
						$r_pass        = iconv("UTF-8", "ISO-8859-9",$_POST["r_pass"]);
						$r_tcnumber    = iconv("UTF-8", "ISO-8859-9",$_POST["r_tcnumber"]);
						$r_namesurname = iconv("UTF-8", "ISO-8859-9",$_POST["r_namesurname"]);
						$r_phone       = iconv("UTF-8", "ISO-8859-9",$_POST["r_phone"]);
						$r_gsmphone    = iconv("UTF-8", "ISO-8859-9",$_POST["r_gsmphone"]);
						$r_email       = iconv("UTF-8", "ISO-8859-9",$_POST["r_email"]);
						$r_birthplace  = iconv("UTF-8", "ISO-8859-9",$_POST["r_birthplace"]);
						$r_birthdate   = iconv("UTF-8", "ISO-8859-9",$_POST["r_birthday"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["r_birthmonth"]).".".iconv("UTF-8", "ISO-8859-9",$_POST["r_birthyear"]);
						$h_blokid      = $_POST["h_blokid"];
						$h_houseid     = $_POST["h_houseid"];
						$h_hostid      = $_POST["h_hostid"];
						$r_regdate     = date("d.m.Y H:i");
						
						try{
							$sql_resident = "UPDATE tbl_Resident SET r_username='$r_username',
							r_pass='$r_pass',r_tcnumber='$r_tcnumber',r_namesurname='$r_namesurname',
							r_phone='$r_phone',r_gsmphone='$r_gsmphone',r_email='$r_email',
							r_birthplace='$r_birthplace',r_birthdate='$r_birthdate',
							r_blokid=$h_blokid,r_houseid=$h_houseid,r_regdate='$r_regdate' WHERE id=$id";
							$this->model->guncelle($sql_resident);
						}catch(PDOException $e){
							$this->view->error = $e->getMessage();
						}
					}
				break;
				//////////////////////#APARTMAN SAKÝNÝ ÝÞLEMLERÝ/////////////////////////////
				//////////////////////GÝRÝÞ ÇIKIÞ ÝÞLEMLERÝ/////////////////////////////
				case "giris_cikis_islemleri":
				$mdl = @$_GET["mdl"];
				
				switch($mdl){
					case "ara":
					
					break;
					
					default:
						$sql = "SELECT io.id,io.siteid,io.in_date,io.out_date,io.tcnumber,io.namesurname,
								io.phone,io.gsmphone,io.email,c.city_name,io.birthdate,b.b_name,he.h_number,ht.h_namesurname
								FROM tbl_InOut io
								LEFT JOIN tbl_City c ON c.id = io.birthplace
								LEFT JOIN tbl_Blok b ON b.id = io.blokid
								LEFT JOIN tbl_House he ON he.id = io.houseid
								LEFT JOIN tbl_Host ht ON ht.id = io.hostid";
							$kayit_sayisi = count($this->model->listele($sql." WHERE io.siteid = $siteid"));
							$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
							if(isset($_GET["s"])){
								$baslangic = $s * $liste - $liste;
							}else{
								$baslangic = 1 * $liste - $liste;
							}
							$this->view->liste = $this->model->listele($sql." WHERE io.siteid = $siteid  
																		ORDER BY io.id DESC LIMIT $baslangic,$liste ");
							//$this->view->blok_list = $this->model->listele("SELECT b.id,b.b_name FROM tbl_Blok b WHERE b.b_siteid = $siteid");
							//$this->view->il_list = $this->model->listele("SELECT * FROM tbl_City");
							//$this->view->status = $this->model->listele("SELECT * FROM tbl_HouseStatus");
					
						$this->view->render("manager/".$do);
					break;
				}
				break;
				//////////////////////#GÝRÝÞ ÇIKIÞ ÝÞLEMLERÝ/////////////////////////////
				
				//////////////////////MUHASEBE ÝÞLEMLERÝ/////////////////////////////
				case "muhasebe_islemleri":
					$mdl = @$_GET["mdl"];
					switch($mdl){
						case "gelir_islemleri":
							$this->view->daire_tipi = $this->model->listele("SELECT DISTINCT h_property FROM tbl_house");
							$this->view->liste = $this->model->listele("SELECT gi.id,gi.gelir_turu,gi.gelir_tipi,d.ozellik_adi 
																		FROM tbl_GelirIslemleri gi
																		LEFT JOIN tbl_DaireOzellik d ON d.id = gi.gelir_tipi");
							$this->view->daire_oz = $this->model->listele("SELECT * FROM tbl_DaireOzellik");
							$this->view->render("manager/".$mdl);
						break;
						
						case "gelir_turu_kaydet":
							if($_POST){
								$gelir_turu = $_POST["gelir_turu"];
								$gelir_tipi = iconv('UTF-8','ISO-8859-9',$_POST["gelir_tipi"]);
								try{
									$last_insert_id = $this->model->kaydet("INSERT INTO tbl_GelirIslemleri VALUES (NULL,$siteid,'$gelir_turu',$gelir_tipi)");
									$url = $_SERVER["HTTP_REFERER"];
									header("Location: $url");
								}catch(PDOException $e){
									$this->view->error = $e->getMessage();
								}
							}else{
								$this->view->error = "bilgiler post edilmedi..";
							}
						break;
						
						default:
							
						break;
					}
					
				break;
				
				//////////////////////#MUHASEBE ÝÞLEMLERÝ/////////////////////////////
				default:
					$this->view->render("manager/index");
				break;
			
			}
			$this->view->render("manager/footer");
		}
	}
	function control(){
		echo 'deneme';
	}
	function manager_data(){
		$this->model->manager_data();
	}
}