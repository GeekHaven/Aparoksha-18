<?php

class Link
{
	public static function Build($link, $type = 'http')
	{
		//$base = ( ($type == 'http' || USE_SSL =='no')? 'http://' : 'https://') . getenv('SERVER_NAME');
		
		//if(defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != 80 && strpos($base, 'https') == false )
		//	$base = $base . ':' .HTTP_SERVER_PORT;
		
		$base = 'http://' . getenv('SERVER_NAME');	
		$link = $base . VIRTUAL_LOCATION . $link;
		return $link;
	}
	
	public static function toThumb($x)
	{
		$link = 'images/img_thumb/' . $x;
		return self::Build($link);
	}
	
	public static function toMajor($x)
	{
		$link = 'images/img_major/' . $x;
		return self::Build($link);
	}
	
	public static function toVote($x, $param = 1)
	{	
		if($param == 1)
			$link = 'index.php?VoteAction=1&Item=' .$x;
		return self::Build($link);
	}
	
	public static function toLogin($x)
	{
		$link = $x;
		return self::Build($link);
	}
	
	public static function toIndex()
	{
		$link = 'index.php';
		return self::Build($link);
	}
	
	public static function toRNF()
	{
		$link = 'index.php?Page=RNF';
		return self::Build($link);
	}
	
	public static function toConformVote($itemId)
	{
		$link = 'index.php?VoteAction=2&Item=' . $itemId;
		return self::Build($link);
	}
	
	public static function VoteUrl()
	{
		$link = 'index.php?Page=MyVote';
		return self::Build($link);
	}
	
	public static function PlaceOrder()
	{
		$link = 'index.php?Page=PlaceOrder';
		return self::Build($link);
	}
	
	public static function CancelOrder($x)
	{
		$link = 'index.php?Page=PlaceOrder&ActionId=' . $x;
		return self::Build($link);
	}
}
?>
