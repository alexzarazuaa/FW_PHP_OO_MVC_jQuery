<?php
// print_r ("entra dai ");
// die();
class shop_dao
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


    public function select_one_product($db, $idprod)
    { //select for details products
        $sql = "SELECT nombre,marca,talla,imagen,precio,descripcion,idprod FROM products  WHERE idprod='$idprod'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_categoria($db, $cat)
    { //select producst from categorias
        $sql = "SELECT *  FROM products WHERE categoria='$cat' order by count_view desc ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_maps($db)
    { //select de las tiendas en Gmaps
        $sql = " SELECT * FROM shops";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_filters($db, $filters)
    { //SELECT DE LOS FILTERS
        $sql = " SELECT * FROM products $filters order by count_view desc";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_btn_seacrh($db, $btnsearch)
    { //SELECT PARA EL BOTON DEL FSEARCH
        $sql = "SELECT *  FROM products $btnsearch order by count_view desc";
        
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function count_views($db, $idprod)
    { //UPDATE DEL COUNT DE CADA PRODUCTO
        $sql = "update products set count_view = (count_view + 1) where idprod = '$idprod' ";
        $stmt = $db->ejecutar($sql);
    }

    public function select_count_pages($db)
    { //select for pagination
        $sql = " SELECT count(*) as allpages FROM products";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_tiendas_gmpas($db)
    { //select shops 
        $sql = " SELECT distinct  s.Tienda,s.latitud,s.longitud FROM products p , shops s, geomaps g where s.idshop = g.idshop and p.idprod = g.idprod";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }



    public function geomaps_desc($db, $latitud, $longitud)
    { //select for miniGmpas 
        $sql = " SELECT distinct p.nombre FROM products p , shops s, geomaps g where s.idshop = g.idshop and p.idprod = g.idprod and s.latitud = '$latitud 'and s.longitud = '$longitud' ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }


    /// LOS LIKES HACERLO CUANDO MIGREMOS EL MODULE DE LOGIN PORQEU COMPROBAMOS SI EL USER ESTA LOGUEADO O NO 

    // /////// LIKES

    // public function like($db, $nickname, $idprod)
    // { //INSERT INTO FOR LIKES
    //     $sql = "INSERT INTO likes (user_ID,product_code) values ('$nickname','$idprod')";
    //     $stmt = $db->ejecutar($sql);
    // }

    // public function unlike($db, $nickname, $idprod)
    // {//FUNCTION FOR DELETE THE LIKE FOR UNLIE IN PRODUCT
    //     $sql = " DELETE from likes where user_ID = '$nickname' and product_code = '$idprod' ";
    //     $stmt = $db->ejecutar($sql);
    // }


    // public function paint_likes($db, $nickname)
    // { //SELECT PARA MOSTRAR LOS LIKES
    //     $sql = " SELECT *  from likes where user_ID = '$nickname'  ";
    //     $stmt = $db->ejecutar($sql);
    //     return $db->listar($stmt);
    // }
    

    /// FUNCTION FOR MODULE CART

    // function insert_cart ($db,$idprod,$id) {//FOR INSERT THE PRODUCT IN CART
   
    //     $sql = " INSERT INTO cart values ('$idprod','$id') ";
    //     $stmt = $db->ejecutar($sql);
    
    // }


}
