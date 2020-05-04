<?php

class login_model {
    
    private $bll;
    static $_instance;
    

    private function __construct() {
        $this->bll = login_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function shops_model(){
         //print_r("entra construc model sop");
        return $this->bll->obtain_shops_bll();
      
    }

}