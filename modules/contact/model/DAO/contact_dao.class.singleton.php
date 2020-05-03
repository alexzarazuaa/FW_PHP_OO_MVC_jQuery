<?php
class contact_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function select_gmap ($db){
        
        $sql = "SELECT * FROM shops";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }


}
    
