<?php
class Logout_Model extends Model {

    function __construct() {
        parent::__construct();
        Session::init();
    }
    
    function quit(){
        $_SESSION = array();
        Session::set('oturum', FALSE);
        Session::destroy();
        header("Location: ../index");
    }
}
?>
