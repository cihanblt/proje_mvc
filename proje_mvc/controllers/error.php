<?php

class Error extends Controllers{

    function __construct() {
        parent::__construct();
        //echo '<h2>Hatal� giri� yapt�n�z!!!</h2>';       
    }
    function index(){
        $this->view->msg = 'Bu sayfaya eri�ilmiyor.';
        $this->view->render('error/index');
    }
}
?>
