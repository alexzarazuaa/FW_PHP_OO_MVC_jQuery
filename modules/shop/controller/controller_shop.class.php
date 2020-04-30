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
	function data_products(){ //function probar que funcion la conexion con db

		//print_r($_GET);
		$json = array();
		$json = loadModel(MODEL_SHOP, "shop_model", "data_products", $_POST['data']);
		echo json_encode($json);
		//echo "daasdasd";
		// print($json);

	}
}
