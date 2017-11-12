<?php

class Conformvote
{
	public $mLinkToConformVote = '';
	public $mLinkToIndex = '';
	public $mVoteText = '';
	public $mImageUrl = '';
	public $mConformVote = 0;
	public $mValue;
	public $poll_complete = 0;
	
	private $mItemId;
	private $mUserId;
	private $mItemDetails;
	
	public function __construct()
	{
		$this -> mLinkToIndex = Link::toIndex();
		
		if(POLL_COMPLETE)
			$this -> poll_complete = 1;
		
		if(!isset($_GET['Item']) || Content::CheckItem($_GET['Item']))
			header('Location: ' . Link::toRNF());
		else
			$this -> mItemId = (int)$_GET['Item'];

		if(isset($_GET['VoteAction']))
		{
			if($_GET['VoteAction'] == 1 && !isset($_POST['conform']))
			{
				if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false)
					$this -> mVoteText = 'Please Login to Vote';
				else if($_SESSION['HasVoted'] == true)
					$this -> mVoteText = 'You have already Voted';
				else if(Content::hasVotedFor($_SESSION['UserId'], $this -> mItemId) )
					$this -> mVoteText = 'You have already voted for this';
				else
				{
					$this -> mItemDetails = Content::getAnItem($this -> mItemId);
					$this -> mVoteText = 'You are about to vote for ' . ($this -> mItemDetails[0]['added_by']) . '\'s Tshirt <br/> Confirm your choice or go back.';
					$this -> mImageUrl = Link::toThumb($this -> mItemDetails[0]['img_thumb']);
					$this -> mLinkToConformVote = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
					$this -> mValue = $this -> mItemId;
					$this -> mConformVote = 1;
				}
			}
		}
		
/*		if(isset($_POST['conform']))
		{
			$this -> mValue = $_POST['conform'];
			$this -> mItemDetails = Content::getAnItem($this -> mValue);
			$this -> mImageUrl = Link::toThumb($this -> mItemDetails[0]['img_thumb']);
			$this -> mVoteText = 'You voted for ' . ($this -> mItemDetails[0]['added_by']). 's Tshirt <br/> <h3 style="color:blue;">Your vote has been Recorded </h3>';	
			Content::AddVote($this -> mValue, $_SESSION['UserId'], $_SERVER['REMOTE_ADDR']);
			$_SESSION['HasVoted'] = Content::hasVoted($_SESSION['UserId']);
			Content::UpdateUser($_SESSION['UserId']);
		}*/
		if(isset($_POST['conform']))
		{
			if(Content::isBlocked($_SESSION['UserId']))
				header('Location: blocked.html');
			else
			{
				$this -> mValue = $_POST['conform'];
				$this -> mItemDetails = Content::getAnItem($this -> mValue);
				$this -> mImageUrl = Link::toThumb($this -> mItemDetails[0]['img_thumb']);
				$this -> mVoteText = 'You voted for ' . ($this -> mItemDetails[0]['added_by']). 's Tshirt <br/> <h3 style="color:blue;">Your vote has been Recorded </h3>';	
				if(Content::alreadyVoteExists($this -> mValue, $_SESSION['UserId']) || Content::hasVoted($_SESSION['UserId']) || POLL_COMPLETE)
					header('Location:'.Link::toIndex());
				else
				{
					Content::AddVote($this -> mValue, $_SESSION['UserId']);
					$_SESSION['HasVoted'] = Content::hasVoted($_SESSION['UserId']);
					Content::UpdateUser($_SESSION['UserId']);
				}
			}
		}
	}			

};

?>
