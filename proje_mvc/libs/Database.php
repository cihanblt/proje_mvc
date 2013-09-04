<?php

class Database extends PDO {

    function __construct() {
        parent::__construct('mysql:host=localhost;dbname=site_management', 'root','');
        $t = $this->query("SET CHARACTER SET latin5");
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $t->execute();
    }

}
?>
