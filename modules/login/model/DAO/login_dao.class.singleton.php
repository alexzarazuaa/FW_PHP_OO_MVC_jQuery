<?php
// print_r ("entra dai ");
// die();
class login_dao
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


    public function select_shops($db)
    { //select shops
        $sql = "SELECT * from shops where 1 = 1";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
}