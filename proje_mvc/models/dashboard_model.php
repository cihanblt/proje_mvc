<?php
class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
      
    }
    function yonetici_kaydet(){
        if($_POST){
             $m_username         = $_POST["m_username"];
             $m_pass             = $_POST["m_pass"];
             $m_pass2            = $_POST["m_pass2"];
             $m_tcnumber         = $_POST["m_tcnumber"];
             $m_namesurname      = $_POST["m_namesurname"];
             $m_birthplace       = $_POST["m_birthplace"];            
             $m_day              = $_POST["m_day"];
             $m_month            = $_POST["m_month"];
             $m_year             = $_POST["m_year"];
                $m_birthdate        = $m_day ."/". $m_month ."/". $m_year;
             $m_gender           = $_POST["m_gender"];
             $m_email            = $_POST["m_email"];
             $m_phone            = $_POST["m_phone"];
             $m_gsmphone         = $_POST["m_gsmphone"];
             $fk_cityid          = $_POST["fk_cityid"];
             $fk_districtid      = $_POST["fk_districtid"];
             $fk_siteid          = $_POST["fk_siteid"];
             $fk_blokid          = $_POST["fk_blokid"];
             $fk_houseid         = $_POST["fk_houseid"];
             $m_address          = $_POST["m_address"];
             $m_type             = $_POST["m_type"];
             $m_regdate          = date("d.m.Y H:i");
             $m_status           = 1;
             
             $kayit = $this->db->prepare("INSERT INTO tbl_Manager VALUES(null,:m_username,:m_pass,:m_tcnumber,:m_namesurname,:m_birthplace,:m_birthdate,:m_gender,:m_phone,:m_gsmphone,:m_cityid,:m_districtid,:m_siteid,:m_blokid,:m_houseid,:m_adress,:m_email,:m_type ,:m_regdate,:m_status)");
             $k = $kayit->execute(array(
                 ":m_username"    => $m_username,
                 ":m_pass"        => $m_pass,
                 ":m_tcnumber"    => $m_tcnumber,
                 ":m_namesurname" => $m_namesurname,
                 ":m_birthplace"  => $m_birthplace,
                 ":m_birthdate"   => $m_birthdate,
                 ":m_gender"      => $m_gender,
                 ":m_phone"       => $m_phone,
                 ":m_gsmphone"    => $m_gsmphone,
                 ":m_cityid"      => $fk_cityid ,
                 ":m_districtid"  => $fk_districtid,
                 ":m_siteid"      => $fk_siteid,
                 ":m_blokid"      => $fk_blokid,
                 ":m_houseid"     => $fk_houseid,
                 ":m_adress"      => $m_address,
                 ":m_email"       => $m_email,
                 ":m_type"        => $m_type,
                 ":m_regdate"     => $m_regdate,
                 ":m_status"      => $m_status
             ));
             return $k;
         }
    }
    function site_kaydet(){
        if($_POST){
            $s_name       = $_POST["s_name"];
            $s_cityid     = $_POST["s_cityid"];
            $s_districtid = $_POST["s_districtid"];
            $s_adress     = $_POST["s_adress"];
            
            $ekle = $this->db->prepare("INSERT INTO tbl_Site VALUES(null,:s_name, :s_cityid, :s_districtid, :s_adress)");
            $k = $ekle->execute(array(
                ":s_name"        => $s_name,
                ":s_cityid"      => $s_cityid,
                ":s_districtid"  => $s_districtid,
                ":s_adress"      => $s_adress
            ));
            return $k;
        }
    }
    function blok_kaydet(){
        if($_POST){
            $b_name       = $_POST["b_name"];
            $b_siteid     = $_POST["b_siteid"];
            
            $kayit = $this->db->prepare("INSERT INTO tbl_Blok VALUES(null,:b_name, :b_siteid)");
            $k = $kayit->execute(array(
                ":b_name" => $b_name,
                ":b_siteid" => $b_siteid
            ));
            return $k;
        }
    }
    function daire_kaydet(){
        if($_POST){
            $h_name   = $_POST["h_name"];
            $h_number = $_POST["h_number"];
            $h_siteid = $_POST["h_siteid"];
            $h_blokid = $_POST["h_blokid"];
            $h_status = $_POST["h_status"];
             
            $kayit = $this->db->prepare("INSERT INTO tbl_House VALUES (null,:h_name, :h_number, :h_siteid, :h_blokid ,:h_status)");
            $k = $kayit->execute(array(
                ":h_name" => $h_name,
                ":h_number" => $h_number,
                ":h_siteid" => $h_siteid,
                ":h_blokid" => $h_blokid,
                ":h_status" => $h_status
            ));
            return $k;
        }
    }
    
    function listele($sql,$param = null){
         
        if(isset($param)){
            $getir = $this->db->query($sql." WHERE ".$param);
            $getir->setFetchMode(PDO::FETCH_ASSOC);
            $veri = $getir->fetchAll();
           //echo $param;
        }else{
            
            $getir = $this->db->query($sql);
            $getir->setFetchMode(PDO::FETCH_ASSOC);
            $veri = $getir->fetchAll();  
        //$list = array($veri["id"],$veri["m_username"],$veri["m_tcnumber"],$veri["m_namesurname"],$veri["m_gender"],$veri["m_phone"],$veri["m_gsmphone"]);
        }
        return $veri;
        
    }
    
    function sil($tablo_adi,$param){
        $sil = $this->db->exec("DELETE FROM ".$tablo_adi." WHERE ".$param);
        return $sil;
    }
}
?>
