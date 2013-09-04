<?php
class Logout extends Controllers {

    function __construct() {
        
    }
    function index(){
        //header('Location: ../index');
    }
    function quit(){
        $this->model->quit();
    }

}
?>