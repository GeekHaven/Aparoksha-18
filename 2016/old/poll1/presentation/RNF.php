<?php

class Rnf
{
	public $mLinkToIndex = '';
	
	public function __construct()
	{
		$this -> mLinkToIndex = Link::ToIndex();
	}
	
	public function init()
	{
	}

};

?>