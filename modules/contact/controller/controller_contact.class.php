<?php
	class controller_contact {
		function __construct(){
			//print_r("enyra cns");
			$_SESSION['module'] = "contact";
		}
		
		function contact(){
			require(VIEW_PATH_INC . "top_page_contact.php");
			require(VIEW_PATH_INC . "menu.html");
			loadView('modules/contact/view/','contact.html');
			require(VIEW_PATH_INC . "footer.html");
	
		}
		
		
		function send_cont(){
			 //echo ("SEND_EMAIL");
			 //die();
			 parse_str ($_POST['data'], $array);
			//   echo($array['cname']);
			$arrArgument = array(
			
				'type' => 'contact',
				'token' => '',
				'inputName' => $array['cname'],
				'inputEmail' => $array['cemail'],
				'inputSubject' => $array['asunto'],
				'inputMessage' => $array['message']
			);
			
			//echo json_encode($arrArgument);
			
			try{
				echo  enviar_email($arrArgument);
				//print_r($arrArgument);
			} catch (Exception $e) {
				echo "<div class='alert alert-error'>Server error. Try later...</div>";
			}
	

			$arrArgument = array(
			
				'type' => 'admin',
				'token' => '',
				'inputName' => $array['cname'],
				'inputEmail' => $array['cemail'],
				'inputSubject' => $array['asunto'],
				'inputMessage' => $array['message']
			);
			
			try{
	            enviar_email($arrArgument);
			} catch (Exception $e) {
				echo "<div class='alert alert-error'>Server error. Try later...</div>";
			}
		 }

	}
