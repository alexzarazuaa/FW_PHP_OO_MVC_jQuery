<?php
@session_start();
class controller_shop
{
	function __construct()
	{
		$_SESSION['module'] = "shop";
	}

	function shop()
	{
		//print_r("entra en shop");
		require(VIEW_PATH_INC . "top_page_shop.php");
		require(VIEW_PATH_INC . "menu.html");
		loadView('modules/shop/view/', 'shop.html');
		require(VIEW_PATH_INC . "footer.html");

		
	
	}
	
	function data_products()
	{ //function probar que funcion la conexion con db
		//print_r($_GET);
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "data_products", $_POST['data']);
		echo json_encode($json);
		//echo "daasdasd";
		// print($json);

	}

	function data_one_product()
	{ //function probar que funcion la conexion con db
		//print_r($_GET);
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "data_one_product", $_POST['data']);
		echo json_encode($json);
		//echo "daasdasd";
		// print($json);

	}

	function count_views (){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "update_countview_prod", $_POST['data']);
		echo json_encode($json);
	}


	function prods_categoria (){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_products_categoria", $_POST['data']);
		echo json_encode($json);
	}

	function select_filter (){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_filters", $_POST['data']);
		echo json_encode($json);
	}

	function select_btnsearch(){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_search", $_POST['data']);
		echo json_encode($json);
	}

	function gmaps (){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_gmaps");
		echo json_encode($json);
	}

	function geomaps (){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_geomaps");
		echo json_encode($json);
	}

	function geomaps_desc(){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_geomaps_desc" ,$_POST['data'],$_POST['data']);
		echo json_encode($json);
	}

	function count_pages(){
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "obtain_countpages_model" );
		echo json_encode($json);
	}



}
