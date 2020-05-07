<?php
@session_start();
class controller_login
{
	function __construct()
	{
		//print_r("enyra cns");
		$_SESSION['module'] = "login";
	}

	function login()
	{
		require(VIEW_PATH_INC . "top_page_login.php");
		require(VIEW_PATH_INC . "menu.html");
		loadView('modules/login/view/', 'login.html');
		require(VIEW_PATH_INC . "footer.html");
	}


	function insert_user()
	{ //function insert_user_manual

		//echo (parse_str($_POST['data'], $matriz));
		parse_str($_POST['data'], $matriz);
		//echo json_encode($matriz);
		echo json_encode($_POST['data']);
		$json = array();
		$json = loadModel(MODEL_LOGIN, "login_model", "insert_user_model",$matriz);
		echo json_encode($json);

		//sendmail
		$arrArgument = array(

			'type' => 'alta',
			'token' => '',
			'inputName' => $matriz['nickname'],
			'inputEmail' => $matriz['email']
		);
		//print_r($arrArgument);
		echo json_encode($arrArgument);

		//activate a 1 when send email
	}
	function exist_user()
	{ //function insert_user_manual

		$json = array();
		$json = loadModel(MODEL_LOGIN, "login_model", "exist_user_model", $_POST['email'], $_POST['nickname']);
		echo json_encode($json);
		//print_r($json);	
	}

	function exist_id()
	{ //function insert_user_manual

		parse_str($_POST['data'],$array);
		$data = array($array,$_POST['manual']);

		$json = array();
		$json = loadModel(MODEL_LOGIN, "login_model", "exist_id_model",$data);
		echo json_encode($json);
		//print_r($json);	
	}

	function active_user(){

		if (isset($_GET['param'])) {

			loadModel(MODEL_LOGIN, "login_model", "active_user",$_GET['param']);
		}
	}

}
