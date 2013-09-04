<?php

class Error extends Controllers{

    function __construct() {
        parent::__construct();
        //echo '<h2>Hatalý giriþ yaptýnýz!!!</h2>';       
    }
    function index(){
        $this->view->msg = 'Bu sayfaya eriþilmiyor.';
        $this->view->render('error/index');
    }
}
?>
