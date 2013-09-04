<?php

class Manager_Model extends Model {

    function __construct() {
        parent::__construct();
        
    }
    public function manager_data(){
 
    		$kadi   = $_SESSION["kadi"];
    		
    		$sor = $this->db->prepare("SELECT * FROM tbl_Manager WHERE m_username=:kadi");
    		$sor->execute(array(
    				':kadi' => $kadi,
    				':sifre' => $sifre
    		));

        	$get = $sor->fetchAll(PDO::FETCH_ASSOC);
            $data = array($get['m_username']);
                        
    	}
    	
    	public function listele($sql){
    		$sorgu = $this->db->prepare($sql);
    		$sorgu->execute();
    		$veri = $sorgu->fetchAll(PDO::FETCH_ASSOC);
    		return $veri;
    		
    	}
    	public function kaydet($sql){
    		$kaydet = $this->db->prepare($sql);
			$kaydet->execute();
			$id = $this->db->lastInsertId();
    		return $id;
    	}
    	
    	public function sil($sql){
				$sil = $this->db->exec($sql);
				return $sil;
    	}
    	public function guncelle($sql){
    		$guncelle = $this->db->exec($sql);
    		return $guncelle;
    	}
}
?>
