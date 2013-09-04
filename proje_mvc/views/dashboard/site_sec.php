<?php

class Site_Sec extends PDO{

    function __construct() {
        parent::__construct('mysql:host=192.168.3.247;dbname=site_management', 'root','nova1905');
        header("Content-type:text/html; Charset=iso-8859-9");
            if($_POST){
                    /* site seçimi */
                   if($_POST["ilce_id"]){
                        $il_id = $_POST["il_id"];
                        $ilce_id = $_POST["ilce_id"];
                        
                        $get = $this->prepare("SELECT * FROM tbl_Site WHERE s_cityid=".$il_id." AND s_districtid=".$ilce_id);
                       
                        $get->execute();
                        $get->setFetchMode(PDO::FETCH_ASSOC);
                        $site = $get->fetchAll();
                            echo '<option>..SEÇÝNÝZ..</option>';
                            for($i = 0 ; $i < count($site) ; $i++){
                                echo '<option value='.$site[$i]["id"].'>'.$site[$i]["s_name"].'</option>';
                            }
                            //echo '<option>'.$il_id."-".$ilce_id.'</option>';
                    }
            }
        }
}
new Site_Sec();
?>
