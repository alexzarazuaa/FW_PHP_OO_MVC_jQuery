<?php

//require(SITE_ROOT . "modules/shop/model/BLL/shop_bll.class.singleton.php");

// echo json_encode("products model class");
// exit;

class shop_model
{

    private $bll;
    static $_instance;


    private function __construct()
    {
        $this->bll = shop_bll::getInstance();
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function data_products($arrArgument)
    {
        //print_r("entra construc model home");
        return $this->bll->obtain_data_products_bll($arrArgument);
        //return $arrArgument;
    }

    public function data_one_product($idprod)
    {
        //print_r("entra construc model home");
        return $this->bll->obtain_data_product_bll($idprod);
        //return $arrArgument;
    }

    public function obtain_products_categoria($cat)
    {
        return $this->bll->obtain_categoria_bll($cat);
    }

    public function obtain_filters($filters)
    {
        return $this->bll->obtain_filters_bll($filters);
    }

    public function obtain_search($btnsearch)
    {
        return $this->bll->obtain_search_bll($btnsearch);
    }

    public function obtain_gmaps()
    {
        return $this->bll->obtain_gmaps_bll();
    }


    public function obtain_geomaps()
    {
        return $this->bll->obtain_geomaps_bll();
    }


    public function obtain_geomaps_desc($latitud, $longitud)
    {
        return $this->bll->obtain_geomaps_desc_bll($latitud, $longitud);
        //return $longitud,$latitud;
    }

    public function obtain_countpages_model()
    {
        return $this->bll->obtain_countpages_bll();
        //return $longitud,$latitud;
    }


    public function insert_like_model($nickname, $idprod)
    {
        return $this->bll->insert_likes_bll($nickname, $idprod);
    }

    
    public function unlike_model($nickname, $idprod)
    {
        return $this->bll->unlike_bll($nickname, $idprod);
    }

      
    public function paint_likes_model($nickname)
    {
        return $this->bll->paint_likes_bll($nickname);
    }



}
