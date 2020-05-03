<?php
class search_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = search_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function obtain_talla_model($marca){
        return $this->bll->obtain_talla_bll($marca);
        //return $marca;
    }

    
    public function obtain_marca_model($talla){
        return $this->bll->obtain_marca_bll($talla);
    }

    public function obtain_autocomplete_model($complete){
        return $this->bll->obtain_autocomplete_bll($complete);
    }
}