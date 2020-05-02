<?php

//  require_once(MODEL_PATH . "db.class.singleton.php");
//  require(SITE_ROOT . "modules/shop/model/DAO/shop_dao.class.singleton.php");

class shop_bll
{
	private $dao;
	private $db;
	static $_instance;

	private function __construct()
	{
		$this->dao = shop_dao::getInstance();
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

	public  function obtain_data_product_bll($idprod)
	{
		return $this->dao->select_one_product($this->db, $idprod);
	}

	public  function update_count_views($idprod)
	{
		return $this->dao->count_views($this->db, $idprod);
	}

	public  function obtain_categoria_bll($cat)
	{
		return $this->dao->select_categoria($this->db, $cat);
	}

	public function obtain_filters_bll ($filters){
		return $this->dao->select_filters($this->db, $filters);
	}

	public function obtain_search_bll ($btnsearch){
		return $this->dao->select_btn_seacrh($this->db, $btnsearch);
	}
	public function obtain_gmaps_bll (){
		return $this->dao->select_maps($this->db);
	}

	public function obtain_geomaps_bll (){
		return $this->dao->select_tiendas_gmpas($this->db);
	}

	public function obtain_geomaps_desc_bll ($latitud, $longitud){
		return $this->dao->geomaps_desc($this->db, $latitud, $longitud);
	}

	public function obtain_countpages_bll (){
		return $this->dao->select_count_pages($this->db);
	}

	

}
