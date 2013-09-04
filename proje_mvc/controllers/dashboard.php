<?php
 class Dashboard extends Controllers {
     public $deger;
     function __construct() {
     	 ob_start();
         parent::__construct();
         Session::init();
         //echo Session::get('oturum');
         if(Session::get('oturum') == FALSE){
             Session::destroy();
             header("Location: index");
         }
         
     }
    
     function index(){
         $go = @$_GET["go"];
         $this->view->render("dashboard/header");
         if(isset($go)){
             switch ($go){
                 case "yonetici_islemleri":
                 	$s = @$_GET["s"];
                 	$liste = 2;
                 	$kayit_sayisi = count($this->listele("SELECT m.id,m.m_username,m.m_tcnumber,m.m_adress,m.m_birthdate,m.m_birthplace,m.m_email,m.m_gender,m.m_gsmphone,m.m_phone,m.m_namesurname,m.m_type,
                                        fk_c.city_name,fk_d.district_name,fk_s.s_name
                                        FROM tbl_Manager AS m 
                                        LEFT JOIN tbl_City fk_c ON m.m_cityid = fk_c.id 
                                        LEFT JOIN tbl_District fk_d ON m.m_districtid = fk_d.id 
                                        LEFT JOIN tbl_Site fk_s ON fk_s.id = m.m_siteid ",null));
                 	$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
                 	if(isset($_GET["s"])){
                 		$baslangic = $s * $liste - $liste;
                 	}else{
                 		$baslangic = 1 * $liste - $liste;
                 	}
                     $this->view->liste = $this->listele("SELECT m.id,m.m_username,m.m_tcnumber,m.m_adress,m.m_birthdate,m.m_birthplace,m.m_email,m.m_gender,m.m_gsmphone,m.m_phone,m.m_namesurname,m.m_type,
                                        fk_c.city_name,fk_d.district_name,fk_s.s_name
                                        FROM tbl_Manager AS m 
                                        LEFT JOIN tbl_City fk_c ON m.m_cityid = fk_c.id 
                                        LEFT JOIN tbl_District fk_d ON m.m_districtid = fk_d.id 
                                        LEFT JOIN tbl_Site fk_s ON fk_s.id = m.m_siteid LIMIT $baslangic,$liste;",null);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "yonetici_ekle":
                     $this->view->il = $this->listele("SELECT * FROM tbl_City",null);
                     $this->view->render("dashboard/".$go);
                 break;
                     
                 case "yonetici_kaydet":
                     $k = $this->yonetici_kaydet();
                     if($k == 1){
                       header("Location:?go=yonetici_islemleri");
                     }  else {
                         echo 'Kaydederken bir hata oluþtu.';
                     }
                 break;
             
                 case "yonetici_detay":
                     $id = $_GET["id"];
                     $this->view->d_liste = $this->listele("SELECT m.id,m.m_username,m.m_tcnumber,m.m_adress,m.m_birthdate,m.m_birthplace,m.m_email,m.m_gender,m.m_gsmphone,m.m_phone,m.m_namesurname,m.m_type,
                                                            fk_c.city_name,fk_d.district_name,fk_s.s_name,fk_b.b_name,fk_h.h_number
                                                            FROM tbl_Manager AS m 
                                                            LEFT JOIN tbl_City fk_c ON m.m_cityid = fk_c.id 
                                                            LEFT JOIN tbl_District fk_d ON m.m_districtid = fk_d.id 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = m.m_siteid 
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = m.m_blockid
                                                            LEFT JOIN tbl_House fk_h ON fk_h.id = m.m_houseid","m.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "yonetici_duzenle":
                     $id = $_GET["id"];
                     $this->view->il = $this->listele("SELECT * FROM tbl_City",null);
                     $this->view->d_liste = $this->listele("SELECT m.id,m.m_username,m.m_tcnumber,m.m_adress,m.m_birthdate,m.m_birthplace,m.m_email,m.m_gender,m.m_gsmphone,m.m_phone,m.m_namesurname,m.m_type,
                                                            fk_c.city_name,fk_d.district_name,fk_s.s_name,fk_b.b_name,fk_h.h_number
                                                            FROM tbl_Manager AS m 
                                                            LEFT JOIN tbl_City fk_c ON m.m_cityid = fk_c.id 
                                                            LEFT JOIN tbl_District fk_d ON m.m_districtid = fk_d.id 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = m.m_siteid 
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = m.m_blockid
                                                            LEFT JOIN tbl_House fk_h ON fk_h.id = m.m_houseid","m.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "yonetici_sil":
                     $id = $_GET["id"];
                     $d = $this->sil("tbl_Manager", "id=".$id);
                     if($d == 1){
                         $url = $_SERVER["HTTP_REFERER"];
                         header("Location:$url");
                     }  else {
                         echo 'Silinirken bir hata oluþtu.';
                     }
                 break;
                 ///////////////////////////////////////////////////////////////
                 case "site_islemleri":
                 	 $s = @$_GET["s"];
                 	 $liste = 2;
                 	 $kayit_sayisi = count($this->listele("SELECT s.id,s.s_adress,s.s_name,fk_c.city_name,fk_d.district_name FROM tbl_Site AS s
                                                            LEFT JOIN tbl_City fk_c ON fk_c.id = s.s_cityid
                                                            LEFT JOIN tbl_District fk_d ON fk_d.id = s.s_districtid",null));
                 	 $this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
            		 if(isset($_GET["s"])){
	                 	 $baslangic = $s * $liste - $liste;
                 	 }else{
                 	 	 $baslangic = 1 * $liste - $liste;
                 	 }
                     $this->view->liste = $this->listele("SELECT s.id,s.s_adress,s.s_name,fk_c.city_name,fk_d.district_name FROM tbl_Site AS s
                                                            LEFT JOIN tbl_City fk_c ON fk_c.id = s.s_cityid
                                                            LEFT JOIN tbl_District fk_d ON fk_d.id = s.s_districtid LIMIT $baslangic,$liste",null);
                     
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "site_ekle":
                     $this->view->il = $this->listele("SELECT * FROM tbl_City",null);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "site_kaydet":
                     $k = $this->site_kaydet();
                     if($k == 1){
                       header("Location:?go=site_islemleri");
                     }  else {
                         echo 'Kaydederken bir hata oluþtu.';
                     }
                 break;
             
                 case "site_detay":
                     $id = $_GET["id"];
                     $this->view->d_liste = $this->listele("SELECT s.id,s.s_adress,s.s_name,fk_c.city_name,fk_d.district_name FROM tbl_Site AS s
                                                            LEFT JOIN tbl_City fk_c ON fk_c.id = s.s_cityid
                                                            LEFT JOIN tbl_District fk_d ON fk_d.id = s.s_districtid;","s.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "site_duzenle":
                     $id = $_GET["id"];
                     $this->view->il = $this->listele("SELECT * FROM tbl_City",null);
                     $this->view->d_liste = $this->listele("SELECT s.id,s.s_adress,s.s_name,fk_c.city_name,fk_d.district_name FROM tbl_Site AS s
                                                            LEFT JOIN tbl_City fk_c ON fk_c.id = s.s_cityid
                                                            LEFT JOIN tbl_District fk_d ON fk_d.id = s.s_districtid;","s.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "site_sil":
                     $id = $_GET["id"];
                     $d = $this->sil("tbl_Site", "id=".$id);
                     if($d == 1){
                         $url = $_SERVER["HTTP_REFERER"];
                         header("Location:$url");
                     }  else {
                         echo 'Silinirken bir hata oluþtu.';
                     }
                 break;
                 ///////////////////////////////////////////////////////////////
                 case "blok_islemleri":
                 	 $s = @$_GET["s"];
                 	 $liste = 2;
                 	 $kayit_sayisi = count($this->listele("SELECT b.id,b.b_name,fk_s.s_name FROM tbl_Blok b
                 	 		LEFT JOIN tbl_Site fk_s ON fk_s.id=b.b_siteid",null));
                 	 $this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
                 	 if(isset($_GET["s"])){
	                 	 $baslangic = $s * $liste - $liste;
                 	 }else{
                 	 	 $baslangic = 1 * $liste - $liste;
                 	 }
                 	 $this->view->liste = $this->listele("SELECT b.id,b.b_name,fk_s.s_name FROM tbl_Blok b
                 	 		LEFT JOIN tbl_Site fk_s ON fk_s.id=b.b_siteid LIMIT $baslangic,$liste",null);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "blok_ekle":
                     $this->view->site = $this->listele("SELECT * FROM tbl_Site",null);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "blok_kaydet":
                     $k = $this->blok_kaydet();
                     if($k == 1){
                       header("Location:?go=blok_islemleri");
                     }  else {
                         echo 'Kaydederken bir hata oluþtu.';
                     }
                 break;
             
                 case "blok_detay":
                     $id = $_GET["id"];
                     $this->view->d_liste = $this->listele("SELECT b.id,b.b_name,fk_s.s_name FROM tbl_Blok b
                                                           LEFT JOIN tbl_Site fk_s ON fk_s.id=b.b_siteid","b.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "blok_duzenle":
                     $id = $_GET["id"];
                     $this->view->site = $this->listele("SELECT * FROM tbl_Site",null);
                     $this->view->d_liste = $this->listele("SELECT b.id,b.b_name,fk_s.s_name FROM tbl_Blok b
                                                           LEFT JOIN tbl_Site fk_s ON fk_s.id=b.b_siteid","b.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "blok_sil":
                     $id = $_GET["id"];
                     $d = $this->sil("tbl_Blok", "id=".$id);
                     if($d == 1){
                         $url = $_SERVER["HTTP_REFERER"];
                         header("Location:$url");
                     }  else {
                         echo 'Silinirken bir hata oluþtu.';
                     }
                 break;
                 ///////////////////////////////////////////////////////////////
                 case "daire_islemleri":
                 	 $s = @$_GET["s"];
                 	 $liste = 2;
                  	 $kayit_sayisi = count($this->listele("SELECT h.id,h.h_name,h.h_number,h.h_status,fk_s.s_name,fk_b.b_name FROM tbl_House h 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = h.h_siteid
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = h.h_blokid",null));
                  	 $this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
                 	 if(isset($_GET["s"])){
                 		$baslangic = $s * $liste - $liste;
                 	 }else{
                 		$baslangic = 1 * $liste - $liste;
                 	 }
                     $this->view->liste = $this->listele("SELECT h.id,h.h_name,h.h_number,h.h_status,fk_s.s_name,fk_b.b_name FROM tbl_House h 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = h.h_siteid
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = h.h_blokid LIMIT $baslangic,$liste",null);
                     $this->view->render("dashboard/".$go);
                 break;
             
                case "daire_ekle":
                     $this->view->site = $this->listele("SELECT * FROM tbl_Site",null);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "daire_kaydet":
                     $k = $this->daire_kaydet();
                     //echo $k;
                     if($k == 1){
                       header("Location:?go=daire_islemleri");
                     }  else {
                         echo 'Kaydederken bir hata oluþtu.';
                     }
                 break;
             
                 case "daire_detay":
                     $id = $_GET["id"];
                     $this->view->d_liste = $this->listele("SELECT h.id,h.h_name,h.h_number,h.h_status,fk_s.s_name,fk_b.b_name FROM tbl_House h 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = h.h_siteid
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = h.h_blokid","h.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "daire_duzenle":
                     $id = $_GET["id"];
                     $this->view->site = $this->listele("SELECT * FROM tbl_Site",null);
                     $this->view->d_liste = $this->listele("SELECT h.id,h.h_name,h.h_number,h.h_status,fk_s.s_name,fk_b.b_name FROM tbl_House h 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = h.h_siteid
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = h.h_blokid","h.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "daire_sil":
                     $id = $_GET["id"];
                     $d = $this->sil("tbl_House", "id=".$id);
                     if($d == 1){
                         $url = $_SERVER["HTTP_REFERER"];
                         header("Location:$url");
                     }  else {
                         echo 'Silinirken bir hata oluþtu.';
                     }
                 break;
                 /////////////////////////////////////////////////
                 case "ilce_sec":
                    // if($_POST){
                         //$il_id = $_POST["il_id"];
                         //$ilceler = $this->listele("tbl_District", "city_id=".$il_id);
                         header("Location: ilce_sec.php");
                         //$this->view->render("dashboard/".$go);
                    // }
                 break;
                 ///////////////////////////////////////////////////
                 
                 case "sakin_islemleri":
                 	$s = @$_GET["s"];
                 	$liste = 2;
                 	$kayit_sayisi = count($this->listele("SELECT r.id,r.r_username,r.r_civilstatus,r.r_email,r.r_gsmphone,r.r_namesurname,r.r_phone,fk_m.id,fk_m.m_namesurname,fk_s.s_name,fk_b.b_name,fk_h.h_number
                                                            FROM tbl_Resident r
                                                            LEFT JOIN tbl_Manager fk_m ON fk_m.id = r.r_managerid
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = r.r_siteid
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = r.r_blockid
                                                            LEFT JOIN tbl_House fk_h ON fk_h.id = r.r_houseid",null));
                 	$this->view->sayfa_sayisi = ceil($kayit_sayisi/$liste);
                 	if(isset($_GET["s"])){
                 		$baslangic = $s * $liste - $liste;
                 	}else{
                 		$baslangic = 1 * $liste - $liste;
                 	}
                     $this->view->liste = $this->listele("SELECT r.id,r.r_username,r.r_civilstatus,r.r_email,r.r_gsmphone,r.r_namesurname,r.r_phone,fk_m.id,fk_m.m_namesurname,fk_s.s_name,fk_b.b_name,fk_h.h_number
                                                            FROM tbl_Resident r
                                                            LEFT JOIN tbl_Manager fk_m ON fk_m.id = r.r_managerid
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = r.r_siteid
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = r.r_blockid
                                                            LEFT JOIN tbl_House fk_h ON fk_h.id = r.r_houseid LIMIT $baslangic,$liste",null);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "sakin_ekle":
                     $this->view->il = $this->listele("SELECT * FROM tbl_City",null);
                     $this->view->render("dashboard/".$go);
                 break;
                     
                 case "yonetici_kaydet":
                     $k = $this->yonetici_kaydet();
                     if($k == 1){
                       header("Location:?go=yonetici_islemleri");
                     }  else {
                         echo 'Kaydederken bir hata oluþtu.';
                     }
                 break;
             
                 case "yonetici_detay":
                     $id = $_GET["id"];
                     $this->view->d_liste = $this->listele("SELECT m.id,m.m_username,m.m_tcnumber,m.m_adress,m.m_birthdate,m.m_birthplace,m.m_email,m.m_gender,m.m_gsmphone,m.m_phone,m.m_namesurname,m.m_type,
                                                            fk_c.city_name,fk_d.district_name,fk_s.s_name,fk_b.b_name,fk_h.h_number
                                                            FROM tbl_Manager AS m 
                                                            LEFT JOIN tbl_City fk_c ON m.m_cityid = fk_c.id 
                                                            LEFT JOIN tbl_District fk_d ON m.m_districtid = fk_d.id 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = m.m_siteid 
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = m.m_blockid
                                                            LEFT JOIN tbl_House fk_h ON fk_h.id = m.m_houseid","m.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
                 
                 case "yonetici_duzenle":
                     $id = $_GET["id"];
                     $this->view->il = $this->listele("SELECT * FROM tbl_City",null);
                     $this->view->d_liste = $this->listele("SELECT m.id,m.m_username,m.m_tcnumber,m.m_adress,m.m_birthdate,m.m_birthplace,m.m_email,m.m_gender,m.m_gsmphone,m.m_phone,m.m_namesurname,m.m_type,
                                                            fk_c.city_name,fk_d.district_name,fk_s.s_name,fk_b.b_name,fk_h.h_number
                                                            FROM tbl_Manager AS m 
                                                            LEFT JOIN tbl_City fk_c ON m.m_cityid = fk_c.id 
                                                            LEFT JOIN tbl_District fk_d ON m.m_districtid = fk_d.id 
                                                            LEFT JOIN tbl_Site fk_s ON fk_s.id = m.m_siteid 
                                                            LEFT JOIN tbl_Blok fk_b ON fk_b.id = m.m_blockid
                                                            LEFT JOIN tbl_House fk_h ON fk_h.id = m.m_houseid","m.id=".$id);
                     $this->view->render("dashboard/".$go);
                 break;
             
                 case "yonetici_sil":
                     $id = $_GET["id"];
                     $d = $this->sil("tbl_Manager", "id=".$id);
                     if($d == 1){
                         $url = $_SERVER["HTTP_REFERER"];
                         header("Location:$url");
                     }  else {
                         echo 'Silinirken bir hata oluþtu.';
                     }
                 break;
                 ////////////////////////////////////////////////////
                 
                 case "ev_sahibi_islemleri":
                 	$this->view->render("dashboard/".$go);	
                 break;

                 case "ev_sahibi_ekle":
                 	$this->view->render("dashboard/".$go);
                 break;
                 
                 default :
                     $this->view->render("dashboard/".$go);
                 break;
             } 
                 
            
         }else{
             $this->view->render("dashboard/index");
         }
         $this->view->render("dashboard/footer");
         
     }
     /* Listeleme Fonksiyonlarý */
     function listele($tablo_adi,$param){
         return $this->model->listele($tablo_adi,$param);
     }
     
     /* Silme Fonksiyonu */
     function sil($tablo_adi,$param){
         return $this->model->sil($tablo_adi,$param);
     }
     /* Kaydet fonksiyonlarý */
     function yonetici_kaydet(){
        return $this->model->yonetici_kaydet();
     }
     
     function site_kaydet(){
        return $this->model->site_kaydet();
     }
     
     function blok_kaydet(){
        return $this->model->blok_kaydet();
     }
     function daire_kaydet(){
        return $this->model->daire_kaydet();
     }
     function __destruct(){
     	ob_end_flush();
     }

}
?>