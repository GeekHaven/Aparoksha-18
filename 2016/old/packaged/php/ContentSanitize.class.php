<?php

class Sanitize
{
	private $s = '';
	public function __construct($str = "")
	{
		$this -> s = $str;
	}
	
	public function cleanString($str)
	{
		$this -> s = addslashes(htmlspecialchars(trim($str), ENT_QUOTES));
		$this -> s  = str_replace("<script>", "</script/>", $this -> s);
		$this -> s = str_replace("'", "", $this -> s);
		$this -> s = str_replace('"', '', $this -> s);
		return $this -> s;
	}
};

?>
