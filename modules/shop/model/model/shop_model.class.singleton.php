<?php

require(SITE_ROOT . "modules/shop/model/BLL/shop_bll.class.singleton.php");

// echo json_encode("products model class");
// exit;

class shop_model {
    
    private $bll;
    static $_instance;
    

    private function __construct() {
        $this->bll = shop_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function data_products($arrArgument){
         //print_r("entra construc model home");
        return $this->bll->obtain_data_products_bll($arrArgument);
        //return $arrArgument;
    }
    

}