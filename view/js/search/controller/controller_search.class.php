<?php
@session_start();
class controller_search
{
	function __construct()
	{
		//print_r("enyra cns");
		$_SESSION['module'] = "search";
	}

	function talla()
	{
		
			$json = array();
			$json = loadModel(MODEL_SEARCH, "search_model", "obtain_talla_model",$_POST['data']);
			echo json_encode($json);
		
	}
	
	function marca()
	{
		
			$json = array();
			$json = loadModel(MODEL_SEARCH, "search_model", "obtain_marca_model",$_POST['data']);
			echo json_encode($json);
		
	}

	function autocomplete()
	{
		
		$json = array();
		$json = loadModel(MODEL_SEARCH, "search_model", "obtain_autocomplete_model",$_POST['data']);
		echo json_encode($json);
	}

}