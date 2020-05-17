<?php


class cart_model {
    
    private $bll;
    static $_instance;
    

    private function __construct() {
        $this->bll = cart_bll::getInstance();
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