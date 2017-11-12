<?php
class Base
{
	public $mCell = 'item.tpl';
	public $mHeader = 'login.tpl';
	
	public function init()
	{
		if(isset($_GET['Page']))
		{
			if($_GET['Page'] == 'RNF')
				$this -> mCell = 'RNF.tpl';
			if($_GET['Page'] == 'MyVote')
				$this -> mCell = 'myvote.tpl';
			if($_GET['Page'] == 'PlaceOrder')
				$this -> mCell = 'placeorder.tpl';
		}
		
		if(isset($_GET['VoteAction']))
		{
			$this -> mCell = 'conformvote.tpl';
		}
		
		if(isset($_GET['MyVote']))
		{
			$this -> mCell = 'myvote.tpl';
		}
		
	}
};
?>