<?php

class Placeorder
{
	public $place_order = 0;
	public $isLogin = 0;
	public $order_details;
	public $order_status = 0;
	public $mLinkToOrder = '';
	
	private $quantity;
	private $size;
	private $gender;
	
	public function __construct()
	{
		if(POLL_COMPLETE)
			$this -> place_order = 1;
		if(isset($_SESSION['LoginStatus']) && $_SESSION['LoginStatus'] == true)
			$this -> isLogin = 1;
			
		$this -> mLinkToOrder = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
	}
	
	public function init()
	{
		if($this -> isLogin == 1 && $this -> place_order == 1)
		{
			$this -> order_details = Content::getOrder($_SESSION['UserId']);
			if(count($this -> order_details) > 0)
			{
				$this -> order_status = 1;
				for($i=0; $i < count($this -> order_details); $i++)
					$this -> order_details[$i]['cancel_url'] = Link::CancelOrder($this -> order_details[$i]['id']);
			}
			
			if(isset($_POST['saveorder']))
			{
				$this -> quantity = (int)$_POST['quantity'];
				$this -> size = $_POST['size'];
				$this -> gender = $_POST['gender'];
				
				Content::AddOrder($_SESSION['UserId'], $this -> quantity, $this -> size, $this -> gender);
				header('Location:' . Link::PlaceOrder());
			}
			
			if(isset($_GET['ActionId']) && is_numeric($_GET['ActionId']))
			{
				$x = $_GET['ActionId'];
				if(Content::FindOrder($x, $_SESSION['UserId']))
				{
					Content::DeleteOrder($x);
					header('Location:' . Link::PlaceOrder());
				}
			}
		}
	}
	
};

?>