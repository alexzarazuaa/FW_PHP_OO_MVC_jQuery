<?php
@session_start();
	class controller_home {
	    function __construct() {
	        $_SESSION['module'] = "home";
	    }

	    function home() {
            //print_r("entra en home");
            require(VIEW_PATH_INC . "top_page_home.php");
			require(VIEW_PATH_INC . "menu.html");
			loadView('modules/home/view/','inicio.html');
			require(VIEW_PATH_INC . "footer.html");
		}
		
		function prueba_data(){ //function probar que funcion la conexion con db
	
				//print_r("entra function prueba data");
				$json = array();
			 	$json = loadModel(MODEL_HOME, "home_model", "prueba_data",$_POST['data']);
				 echo json_encode($json);
				 //echo "daasdasd";
				// print($json);
			
		}
		function data_carousel (){// function para la imagenes del carousel
			print_r("entra function prueba carousel");
			$json = array();
			$json = loadModel(MODEL_HOME, "home_model", "data_carousel",$_POST['data']);
			echo json_encode($json);
	
		}
		function data_categories (){// function para la imagenes del carousel
			//print_r("entra function prueba cateogires");
			$json = array();
			$json = loadModel(MODEL_HOME, "home_model", "data_categories",$_POST['data']);
			echo json_encode($json);
		
		}

		function count_categoria (){//FUNCTION COUNT VIEW CATEGORIAS HOME
				//print_r("entra function  count");
				$json = array();
				$json = loadModel(MODEL_HOME, "home_model", "count_categoria",$_POST['data']);
				echo json_encode($json);
				
			
		}

		function active_user(){
			//echo json_encode($_POST['data']);

			// print_r("active user jaja loco");
			// die();
	
			//data variabke with name module,namefunction and the token to check and activate
			
	
				loadModel(MODEL_HOME, "home_model", "active_user",$_GET['param']);
				header('Location: ' . SITE_PATH);
			
		}
		

    }