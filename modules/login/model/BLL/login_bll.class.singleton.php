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

	public  function insert_register_user($data)
	{
		return $this->dao->insert_user($this->db, $data);
		//return $data;

	}
	public  function exist_user_bll($user_email, $nickname)
	{

		return $this->dao->insert_user($this->db, $user_email, $nickname);
		//return $data;

	}
	public  function check_id_bll($data)
	{

		$id =  $this->dao->select_id($this->db);
		//print_r($data[0]['email']);
		//print_r(array_slice($id,0));

		$res = false;
		$rlt = false;

		for ($i = 0; $i < count($id); $i++) {
			if ($res == false) {
				if (($id[$i]['userid']) == ($data[0]['nickname'])) {
					$res = true;
					return "THIS USER NAME IS ALREADY IN USE";
					// break;
				} else {
					$res = false;
					$rlt = "OK";
				}
			}
		}


		//return $rlt;

		//solamente cuando no encuentre un id igual 
		if ($rlt == "OK") {

			//solamente cuando venga de registrarse de nuestra pagina de login
			if ($data[1] == 'manual') {


				$check_mail = $this->dao->user_email($this->db);
				//print_r($check_mail);

				$res = false;
				$rlt = false;

				// y comprobamos que exista uno que sea igual
				for ($i = 0; $i < count($check_mail); $i++) {

					if ($res == false) {
						//si encuentra un mail igual
						if (($check_mail[$i]['user_email']) == ($data[0]['email'])) {
							$res = true;
							return "This mail is alredy in use";
						} else {
							$res = false;
							$rlt = 'ok';
						}
					}
				} //end_for
			} //end_if manual1
		} //end_if_ok



		if ($rlt == 'ok') {
			return $this->dao->insert_user($this->db, $data[0]);
		}
	}

	 public function mail_recover_bll($data){


		$check_mail = $this->dao->user_email($this->db);
		//print_r($data);
		//print_r(array_slice($check_mail,0));
		//print_r(array_slice($check_mail,0));
		//user_email

		$res = false;
	

		// y comprobamos que exista uno que sea igual
		for ($i = 0; $i < count($check_mail); $i++) {

			if ($res == false) {
				//si encuentra un mail igual
				if (($check_mail[$i]['user_email']) == ($data)) {
					$res = true;
					return $this->dao->updatetoken_mail($this->db,$data);
					//return true;
				} else {
					$res = false;
					return false;
				}
			}
		} //end_for
	

	}//end_func


	public function update_password_bll($data){
		//$token = $this->dao->updatetoken_mail($this->db,$data);
		return $this->dao->update_password($this->db, $data);
		//return $token;
	}

}
