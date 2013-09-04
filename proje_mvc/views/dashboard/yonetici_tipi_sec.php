<?php

class Yonetici_Tipi_Sec extends PDO {

 function __construct() {
        parent::__construct('mysql:host=192.168.3.247;dbname=site_management', 'root','nova1905');
        header("Content-type:text/html; Charset=iso-8859-9");
            if($_POST){
                    /* blok seçimi */
                   if($_POST["site_id"]){
                        $site_id = $_POST["site_id"];
                        
                        $get = $this->prepare("SELECT * FROM tbl_Manager WHERE m_siteid=".$site_id);
                       
                        $get->execute();
                        $get->setFetchMode(PDO::FETCH_ASSOC);
                        $yonetici = $get->fetchAll();
                         echo '<option>..SEÇÝNÝZ..</option>';
                          for($i = 0 ; $i < count($yonetici) ; $i++){
                               echo '<option value='.$yonetici[$i]["id"].'>'.$yonetici[$i]["m_namesurname"].'</option>';
                          }
                       //     echo '<option>'.$il_id."-".$ilce_id.'</option>';
                       echo ' ';
                    }
            }
        }
}
new Yonetici_Tipi_Sec();
?>
