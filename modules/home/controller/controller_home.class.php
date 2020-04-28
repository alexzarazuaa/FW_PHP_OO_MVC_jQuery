<?php
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
				$json = array();
			 	$json = loadModel(MODEL_HOME, "home_model", "obtain_data_BLL");
				 //echo json_encode($json);
				 print_r($json);
			
	    }

    }