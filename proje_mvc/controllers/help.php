<?php

class Help extends Controllers {

    function __construct() {
        parent::__construct();
    }
    public function other($arg = false){
        echo 'Buras� other fonksiyonu';
        echo 'Verilen De�er : ' . $arg . '<br />';
        
        require 'models/help_model.php';
        $model = new Help_Model();
    }
    function index(){
        $this->view->render('help/index');
    }

}
?>
