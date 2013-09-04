<?php

class Bootstrap {

    function __construct() {
    	ob_start();
        $url = isset($_GET['url']) ? @$_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = explode('/', $url);
        
        if(empty($url[0])){
            require 'controllers/index.php';
            $controllers = new Index();
            $controllers->index();
            return false;
        }
        
        $dosya = 'controllers/'.$url[0].'.php';
        if(file_exists($dosya)){
            require $dosya;
            
            $kontrol = new $url[0];
            $kontrol->loadModel($url[0]);
            $kontrol->index();
            if(isset($url[2])){
                if(method_exists($kontrol, $url[1])){
                    $kontrol->{$url[1]}($url[2]);
                }else{
                    require 'controllers/error.php';
                        $error = new Error();
                        $error->index();
                }
            }  else {
                if(isset($url[1])){
                    if(method_exists($kontrol, $url[1])){
                        $kontrol->{$url[1]}();
                    }else{
                        require 'controllers/error.php';
                        $error = new Error();
                        $error->index();
                    }
                }
            }
            
        } else {
            require 'controllers/error.php';
            $error = new Error();
            $error->index();
        }
        function __destruct(){
        	ob_end_flush();
        }
       
        function error(){
            
        }
        
    }

}

?>
