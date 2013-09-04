<?php

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    public function run(){
        $kadi   = $_POST["kadi"];
        $sifre  = $_POST["sifre"];
        //echo $kadi.$sifre;
        $sor = $this->db->prepare("SELECT * FROM tbl_Admin WHERE a_username=:kadi AND a_pass=:sifre");
        $sor->execute(array(
            ':kadi' => $kadi,
            ':sifre' => $sifre
        ));
        //echo $sor->rowCount();
        if($sor->rowCount() > 0){
            Session::init();
            Session::set('oturum', TRUE);
            Session::set('kadi', $kadi);
            header('Location: ../dashboard');
        }else{
        	header("Location:../login");
        }
        
        /*while($get = $sor->fetch(PDO::FETCH_ASSOC)){
            echo $get['a_username'].'deðer';
        }*/
    }
}
?>
