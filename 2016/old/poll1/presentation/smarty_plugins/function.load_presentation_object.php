<?php

function smarty_function_load_presentation_object($params, $smarty)
{
	//In params the parametres get passed where this function has been loaded. For now.. Filename is passed. In smarty the parametre to make as object
	// is passed.
	
	require_once PRESENTATION_DIR. $params['filename'] . '.php';  //aquiring filename.php
	$classname = str_replace(' ', '', ucfirst( str_replace( '_', ' ', $params['filename']) ) );
	$obj = new $classname();
	
	if(method_exists($obj, 'init'))
	{
		$obj -> init();
	}
	
	$smarty -> assign($params['assign'], $obj);
}

?>