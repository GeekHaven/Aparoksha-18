<?php

class Item
{
	public $items;
	public $item_images;
	public $has_voted = 0;
	public $filter_url;
	
	private $temp = 0;
	private $total_votes;
	
	public function __construct()
	{
		if(POLL_COMPLETE == true)
			$this -> has_voted = 1;
		if(isset($_SESSION['HasVoted']) && $_SESSION['HasVoted'] == true)
			$this -> has_voted = 1;
	}
	
	public function init()
	{
		if(isset($_GET['ViewItem']))
		{
			$this -> temp = $_GET['ViewItem'];
		}
		
		$this -> filter_url[0] = Link::Build('index.php?ViewItem=1');
		$this -> filter_url[1] = Link::Build('index.php?ViewItem=2');
		$this -> filter_url[2] = Link::Build('index.php?ViewItem=3');
		$this -> filter_url[3] = Link::Build('index.php?ViewItem=4');
		
		$this -> items = Content::getItems($this -> temp);
		$this -> item_images = Content::getItemImages();
		$this -> total_votes = Content::getTotalVotes();
		
		for($i = 0; $i < count($this -> items); $i++)
		{
			$this -> items[$i]['thumb_url'] = Link::toThumb($this -> items[$i]['img_thumb']);
			$this -> items[$i]['link_to_vote'] = Link::toVote($this -> items[$i]['item_id']);
			$this -> temp = Content::getCurrentVotes($this -> items[$i]['item_id']);
			$this -> items[$i]['current_votes'] = $this -> temp[0]['total_votes'];
			$this -> items[$i]['vote_percent'] = ($this -> temp[0]['total_votes'] * 100) / ($this -> total_votes[0]['total_votes']);
			
			if(isset($_SESSION['UserId']))
				$this -> items[$i]['can_vote'] = !(Content::hasVotedFor($_SESSION['UserId'], $this -> items[$i]['item_id']));
			else
				$this -> items[$i]['can_vote'] = 1;
		}
		for($i = 0; $i < count($this -> item_images); $i++)
			$this -> item_images[$i]['image_url'] = Link::toMajor($this -> item_images[$i]['img_major']);
		
	}
};

?>