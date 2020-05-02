<?php

// require_once(MODEL_PATH . "db.class.singleton.php");
// require(SITE_ROOT . "modules/home/model/DAO/home_dao.class.singleton.php");

	class home_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
			$this->dao = home_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }

	    public function obtain_data_list_BLL(){
	      return $this->dao->select_data($this->db);
	    }
	    public function obtain_carousel_BLL(){
	      return $this->dao->select_img_carousel($this->db);
		}
		public function obtain_categories_BLL($limit){
			return $this->dao->select_categories($this->db,$limit);
		}
		public function obtain_countcateg_BLL($categoria){
			return $this->dao->countval($this->db,$categoria);
		}
		

	  
	}