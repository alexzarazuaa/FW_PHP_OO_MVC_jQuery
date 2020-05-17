<?php



class cart_bll
{
	private $dao;
	private $db;
	static $_instance;

	private function __construct()
	{
		$this->dao = cart_dao::getInstance();
		$this->db = db::getInstance();
	}

	public static function getInstance()
	{
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public  function obtain_data_products_bll($arrArgument)
	{
		return $this->dao->select_products($this->db, $arrArgument);
	}


}
