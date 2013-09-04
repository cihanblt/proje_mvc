<?php

class Index extends Controllers {

    function __construct() {
        parent::__construct();
    }
    function index(){
        $this->view->render('index/index');
        if($_POST){
        	$giris = $_POST["giris-tipi"];
        	if($giris == 0){
        		
        	}else{
        		header("Location:manager/run");
        	}
        }
    }

}
?>
