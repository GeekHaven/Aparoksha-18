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
		return $this -> s;
	}
	
	public function cleanHtml($str)
	{
		$this -> s  = str_replace("'", "", $str );
		$this -> s  = str_replace('"', '', $str );
		$this -> s  = str_replace("<script>", "</script/>", $str);
		return $this -> s;
	}
	
	public function cleanJs($str)
	{
		$this -> s = str_replace("'", "", $str);
		$this -> s = str_replace('"', '', $str);
		return $this -> s;
	}
	
	public function cleanFileName($str)
	{
		$st = $str;
		$newstr = "";
		for($i = 0; $i < strlen($st); $i++)
		{
			if( ($st[$i] >='A' && $st[$i] <='Z') || ($st[$i] >='a' && $st[$i] <='z') || ($st[$i] >='0' && $st[$i] <='9') || $st[$i] == '.' || $st[$i] == '_')
				$newstr = $st[$i];
			/*
			$c = 0;
			if($st[$i] == '.')
				$c++;
			if($c > 1)
				return false;
			if( ($st[$i] >='A' && $st[$i] <='Z') || ($st[$i] >='a' && $st[$i] <='z') || ($st[$i] >='0' && $st[$i] <='9') || $st[$i] == '.' || $st[$i] == '_')
				continue;
			else
				return false; */
		}
		return $newstr;
	}
};

?>
