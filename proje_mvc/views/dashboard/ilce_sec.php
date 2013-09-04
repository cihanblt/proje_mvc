
<?php

class Ilce_Sec extends PDO {

    function __construct() {
        parent::__construct('mysql:host=192.168.3.247;dbname=site_management', 'root','nova1905');
        if($_POST){
            header("Content-type:text/html; Charset=iso-8859-9");
            /* ilce seçimi */
            
            if($_POST["il_id"]){
                $il_id = $_POST["il_id"];
                $get = $this->prepare("SELECT * FROM tbl_District WHERE city_id=".$il_id);
                $get->execute();
                $get->setFetchMode(PDO::FETCH_ASSOC);
                $ilce = $get->fetchAll();
                    echo '<option>..SEÇÝNÝZ..</option>';
                    for($i = 0 ; $i < count($ilce) ; $i++){
                       echo '<option value='.$ilce[$i]["id"].'>'.$ilce[$i]["district_name"].'</option>';
                    }
                   // echo 'hata';    
              }   
        }
    }

}
new Ilce_Sec();
?>
