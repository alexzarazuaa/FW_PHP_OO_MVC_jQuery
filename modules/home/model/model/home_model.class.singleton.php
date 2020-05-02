<?php

//require(SITE_ROOT . "modules/home/model/BLL/home_bll.class.singleton.php");
//echo json_encode("products model class");
// exit;

class home_model
{

    private $bll;
    static $_instance;


    private function __construct()
    {
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function prueba_data()
    {
        //print_r("entra construc model home");
        return $this->bll->obtain_data_list_BLL();
    }
    public function data_carousel()
    {
        //print_r("entra construc model home");
        return $this->bll->obtain_carousel_BLL();
    }
    public function data_categories($limit)
    {
        //print_r("entra funct model categories");
        return $this->bll->obtain_categories_BLL($limit);
    }
    public function count_categoria($categoria)
    {
        //print_r("entra funct model categories");
        return $this->bll->obtain_countcateg_BLL($categoria);
    }
}
