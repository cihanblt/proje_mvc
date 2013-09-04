<?php

class Controllers {

    function __construct() {
       // echo 'controllers devrede<br />';
        $this->view = new View();
    }
    public function loadModel($name){
        
        $path = 'models/'.$name.'_model.php';
        
        if(file_exists($path)){
            require $path;
            $modelName = $name.'_Model';
            $this->model = new $modelName();
        }
    }
}
?>
