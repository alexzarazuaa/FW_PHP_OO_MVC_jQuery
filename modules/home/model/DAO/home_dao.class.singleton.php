<?php
// print_r ("entra dai ");
// die();
class home_dao
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


    public function select_data($db)
    { //prueba conectar con db 
        //print_r("entra function dao");

        $sql = "SELECT idprod FROM products ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
        //return $loco; 
    }

    public function select_img_carousel($db)
    { //imagenes carousel
        $sql = "SELECT link,categoria FROM images ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }


    public function select_categories($db,$limit)
    { //data img categories
         //print_r("entra function dao");
        $sql = " SELECT categoria,imagen from categories order by cont_viewed desc limit $limit  ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
    public function countval($db,$categoria)
    { //update del count del click en categorias
         
         $sql = "UPDATE categories set cont_viewed = (cont_viewed + 1) where categoria = '$categoria' ";
         return $db->ejecutar($sql);
    }

    public function active_user($db,$data) {
        // return "dentro select";
        $token_update = generate_Token_secure(20);
        $sql="UPDATE user SET active=1,token='$token_update' where token='$data'";
        return $db->ejecutar($sql);
    }
  

    
}
