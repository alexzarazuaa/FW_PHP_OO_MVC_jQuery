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
	
		if (empty($_GET['param'])){
			loadView('modules/login/view/', 'login.html');
		}else{
			loadView('modules/login/view/', 'recover_pass.html');
		}
		require(VIEW_PATH_INC . "footer.html");
	}




	function insert_user()
	{ //function insert_user_manual

		//echo (parse_str($_POST['data'], $matriz));
		parse_str($_POST['data'], $matriz);
		//echo json_encode($matriz);
		//echo json_encode($_POST['data']);
		$json = array();
		$json = loadModel(MODEL_LOGIN, "login_model", "insert_user_model", $matriz);
		echo json_encode($json);
		//print_r($json);

		//sendmail
		$arrArgument = array(

			'type' => 'alta',
			'token' => $json,
			'inputName' => $matriz['nickname'],
			'inputEmail' => $matriz['email']
		);
		//print_r($arrArgument);
		//echo json_encode($arrArgument);
		try {
			echo  enviar_email($arrArgument);
			//print_r($arrArgument);
		} catch (Exception $e) {
			echo "<div class='alert alert-error'>Server error. Try later...</div>";
		}
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

		parse_str($_POST['data'], $array);
		$data = array($array, $_POST['manual']);

		$json = array();
		$json = loadModel(MODEL_LOGIN, "login_model", "exist_id_model", $data);
		echo json_encode($json);
		//print_r($json);	
	}

	function recover_mail()
	{

			//print_r("recoever mail");
				//echo("esta empty");
			parse_str($_POST['data'], $array);
			//$data = array($array,$_POST['manual']);

			$json = array();
			$json = loadModel(MODEL_LOGIN, "login_model", "mail_recover_model", $array['recmail']);

			//print_r($json);
			//$token = generate_Token_secure(20);

			if ($json === false) {
				echo ("ERROR");
			} else {
				//echo ("TRUE");
				//sendmail
				$arrArgument = array(

					'type' => 'changepass',
					'token' => $json,
					'inputEmail' => $array['recmail']
				);
				//print_r($arrArgument);
				//echo json_encode($arrArgument);
				try {
					echo  enviar_email($arrArgument);
					//print_r($arrArgument);
				} catch (Exception $e) {
					echo "<div class='alert alert-error'>Server error. Try later...</div>";
				}
			

	}
}



	function change_password()
	{

		//if (isset($_GET['param'])){
			parse_str($_POST['data'], $matriz);
			echo json_encode($matriz);
			//echo json_encode($_POST['data']);
			$data = array($matriz['newpassword'],$_POST['token']);
			
	
			$json = array();
			$json = loadModel(MODEL_LOGIN, "login_model", "update_password_model",$data);
			echo json_encode($json);
		//}

	}
}

