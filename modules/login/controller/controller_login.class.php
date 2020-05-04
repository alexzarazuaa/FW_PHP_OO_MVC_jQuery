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


	

}
