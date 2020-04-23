<?php
	class controller_contact {
		function __construct(){
			//print_r("enyra cns");
			$_SESSION['module'] = "contact";
		}
		
		function list_contact(){
			require(VIEW_PATH_INC . "top_page_contact.php");
			require(VIEW_PATH_INC . "menu.html");
			loadView('modules/contact/view/','contact.html');
			require(VIEW_PATH_INC . "footer.html");
	
		}
		
		
		function send_cont(){
			 print_r("send_cont");
			// die();
			 echo ("SEND_EMAIL");
			 die();
			$data_mail = array();
			$data_mail = json_decode($_POST['inf_data'],true);
			echo($data_mail);
			$arrArgument = array(
				'type' => 'contact',
				'token' => '',
				'inputName' => $data_mail['cname'],
				'inputEmail' => $data_mail['cemail'],
				'inputSubject' => $data_mail['asunto'],
				'inputMessage' => $data_mail['message']
			);
			
			//set_error_handler('ErrorHandler');
			try{
	            echo "<div class='alert alert-success'>".enviar_email($arrArgument)." </div>";
			} catch (Exception $e) {
				echo "<div class='alert alert-error'>Server error. Try later...</div>";
			}
			//restore_error_handler();

			$arrArgument = array(
				'type' => 'admin',
				'token' => '',
				'inputName' => $data_mail['cname'],
				'inputEmail' => $data_mail['cemail'],
				'inputSubject' => $data_mail['asunto'],
				'inputMessage' => $data_mail['message']
			);
			try{
	            enviar_email($arrArgument);
			} catch (Exception $e) {
				echo "<div class='alert alert-error'>Server error. Try later...</div>";
			}
		}

	}
