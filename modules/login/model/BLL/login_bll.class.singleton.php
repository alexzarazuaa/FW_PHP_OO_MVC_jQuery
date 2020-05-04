<?php

//  require_once(MODEL_PATH . "db.class.singleton.php");
//  require(SITE_ROOT . "modules/shop/model/DAO/shop_dao.class.singleton.php");

class login_bll
{
	private $dao;
	private $db;
	static $_instance;

	private function __construct()
	{
		$this->dao = login_dao::getInstance();
		$this->db = db::getInstance();
	}

	public static function getInstance()
	{
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public  function obtain_shops_bll()
	{
		return $this->dao->select_shops($this->db);
    }
}