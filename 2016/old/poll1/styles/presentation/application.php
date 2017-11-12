<?php

require_once SMARTY_DIR.'Smarty.class.php';

/*Used to display smarty filters */
Class Application extends Smarty
{
	public function __construct()
	{
		parent::__construct();
			//Changing default template directories. Contants defined in config.php.
		$this -> template_dir = TEMPLATE_DIR;
		$this -> compile_dir = COMPILE_DIR;
		$this -> config_dir = CONFIG_DIR;
		
		$this -> plugins_dir[0] = SMARTY_DIR . 'plugins';
		$this -> plugins_dir[1] = PRESENTATION_DIR . 'smarty_plugins';
	}
}
?>
	