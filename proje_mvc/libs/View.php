<?php

class View {

    function __construct() {
       // echo 'Buras� view sayfas�<br/>';
    }
    public function render($name){
        //require 'views/header.php';
        require_once  'views/'.$name.'.php';
        //require 'views/footer.php';
    }
}
?>
