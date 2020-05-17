<?php
// print_r ("entra dai ");
// die();
class cart_dao
{
    static $_instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function select_products($db, $arrArgument)
    { //prueba conectar con db 
        //print_r("entra function dao");

        $sql = " SELECT * from products order by count_view desc limit $arrArgument , 3";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
        //return $loco; 
    }



}
