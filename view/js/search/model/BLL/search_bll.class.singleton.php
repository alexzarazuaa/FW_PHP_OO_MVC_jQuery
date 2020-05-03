<?php
class search_bll
{
    private $dao;
    private $db;
    static $_instance;

    private function __construct()
    {
        $this->dao = search_dao::getInstance();
        $this->db = db::getInstance();
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public  function obtain_talla_bll($marca)
    {
        return $this->dao->select_talla($this->db,$marca);
    }

    public  function obtain_marca_bll($talla)
    {
        return $this->dao->select_marca($this->db,$talla);
    }


    public  function obtain_autocomplete_bll($complete)
    {
        return $this->dao->autocomplete($this->db,$complete);
    }
}
