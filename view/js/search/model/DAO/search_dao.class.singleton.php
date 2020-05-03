<?php
class search_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function select_talla ($db,$marca){
        
        $sql = "SELECT DISTINCT talla FROM products $marca";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_marca ($db,$talla){
        
        $sql = "SELECT DISTINCT marca FROM products $talla";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function autocomplete($db,$complete) 
    {
        
        $sql = "SELECT *  FROM products $complete";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }


}
  