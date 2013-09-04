<?php

class View {

    function __construct() {
       // echo 'Burasý view sayfasý<br/>';
    }
    public function render($name){
        //require 'views/header.php';
        require_once  'views/'.$name.'.php';
        //require 'views/footer.php';
    }
}
?>
