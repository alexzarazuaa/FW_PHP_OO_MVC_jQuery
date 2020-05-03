<?php
class contact_bll
{
    private $dao;
    private $db;
    static $_instance;

    private function __construct()
    {
        $this->dao = contact_dao::getInstance();
        $this->db = db::getInstance();
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public  function obtain_gmaps_bll()
    {
        return $this->dao->select_gmap($this->db);
    }
}
