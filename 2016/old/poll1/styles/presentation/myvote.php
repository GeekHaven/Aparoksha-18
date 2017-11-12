<?php

class Myvote
{
	public $mItemDetails;
	public $hasVoted;
	public $isLogin = 0;
	
	private $userid;
	private $temp;
	
	public function __construct()
	{
		if(isset($_SESSION['UserId']))
		{
			$this -> isLogin = 1;
			if(Content::hasVotedOne($_SESSION['UserId']))
			{
				$this -> isLogin = 2;
				$this -> userid = $_SESSION['UserId'];
				if($_GET['Page'] == 'MyVote')
				{
					$this -> mItemDetails = Content::getMyVotes($this -> userid);
					for($i = 0; $i < count($this -> mItemDetails); $i++)
					{
						$this -> temp = Content::getCurrentVotes($this -> mItemDetails[$i]['item_id']);
						$this -> mItemDetails[$i]['total_votes'] = $this -> temp[0]['total_votes'];
						$this -> mItemDetails[$i]['thumb_url'] = Link::toThumb($this -> mItemDetails[$i]['img_thumb']);
					}
				}
			}
		}
	}

};

?>