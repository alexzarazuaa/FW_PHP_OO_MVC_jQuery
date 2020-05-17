<?php
@session_start();
class controller_cart
{
	function __construct()
	{
		$_SESSION['module'] = "cart";
	}

	function cart()
	{
		//print_r("entra en cart");
		require(VIEW_PATH_INC . "top_page_cart.php");
		require(VIEW_PATH_INC . "menu.html");
		loadView('modules/cart/view/', 'cart.html');
		require(VIEW_PATH_INC . "footer.html");

		
	
	}
	
	// function data_products()
	// { //function obtener todos los productos contando con el limit y el count_view
	// 	//print_r($_GET);
	// 	$json = array();
	// 	$json = loadModel(MODEL_SHOP, "shop_model", "data_products", $_POST['data']);
	// 	echo json_encode($json);
	

	// }

	



}
