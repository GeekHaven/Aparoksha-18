<?php

class Content
{
	public static function getAnItem($itemId)
	{
		$sql = 'SELECT * FROM poll.item WHERE item_id = :item_id';
		$params = array(':item_id' => $itemId);
		return DatabaseHandler::GetAll($sql, $params);
	}
		
	public static function getItems($x)
	{
		switch($x)
		{
			case 1: $sql = 'SELECT * FROM poll.item ORDER by item_id DESC LIMIT 0,100';
					break;
			case 2: $sql = 'SELECT * FROM poll.item ORDER by item_id ASC LIMIT 0,100';
					break;
			case 3: $sql = 'SELECT A.*, B.votes FROM item A, (SELECT item_id, COUNT(item_id) as votes FROM vote GROUP BY item_id LIMIT 0, 100) B WHERE A.item_id = B.item_id ORDER BY votes ASC LIMIT 0,100;';
					break;
			default:
					$sql = 'SELECT A.*, B.votes FROM item A, (SELECT item_id, COUNT(item_id) as votes FROM vote GROUP BY item_id LIMIT 0, 100) B WHERE A.item_id = B.item_id ORDER BY votes DESC LIMIT 0,100;';
		}

		return DatabaseHandler::GetAll($sql);
	}
	
	public static function getItemImages()
	{
		$sql = 'SELECT * FROM poll.item_media ORDER BY item_id LIMIT 0, 100';
		return DatabaseHandler::GetAll($sql);
	}
	
	public static function hasVoted($username)
	{
		$sql = 'SELECT * FROM poll.vote WHERE voted_by = :user_name';
		$params = array(':user_name' => $username);
		$x = DatabaseHandler::GetAll($sql, $params);
		if(count($x) < 3)
			return 0;
		else
			return 1; 
	}
	
	public static function AddVote($id, $userid, $ip)
	{
		$sql = 'INSERT INTO poll.vote (voted_by, item_id, ip, date) VALUES(:user_id, :id, :ip, NOW())';
		$params = array('user_id' => $userid, ':id' => $id, ':ip' => $ip);
		DatabaseHandler::Execute($sql, $params);
		return 1;
	}
	
	public static function getCurrentVotes($id)
	{
		$sql = 'SELECT COUNT(*) as total_votes FROM poll.vote WHERE item_id = :itemId';
		$params = array(':itemId' => $id);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function getMyVotes($user_id)
	{
		$sql = 'SELECT * FROM poll.item WHERE item_id in (SELECT item_id FROM poll.vote WHERE voted_by = :user_id)';
		$params = array(':user_id' => $user_id);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function getTotalVotes()
	{
		$sql = 'SELECT COUNT(*) as total_votes FROM poll.vote';
		return DatabaseHandler::GetAll($sql);
	}
	
	public static function CheckItem($x)
	{
		$sql = 'SELECT COUNT(*) as num FROM poll.item WHERE item_id = :x';
		$params = array(':x' => $x);
		$temp = DatabaseHandler::GetAll($sql, $params);
		if($temp[0]['num'] == 0)
			return 1;
		else
			return 0;
	}
	
	public static function hasVotedFor($userid, $itemid)
	{
		$temp = 0;
		$sql = 'SELECT * FROM poll.vote WHERE item_id = :itemId AND voted_by = :votedBy';
		$params = array(':itemId' => $itemid, ':votedBy' => $userid);
		$temp = DatabaseHandler::GetAll($sql, $params);
		if(count($temp) > 0)
			return 1;
		else
			return 0;	
	}
	
	public static function hasVotedOne($username)
	{
		$sql = 'SELECT * FROM poll.vote WHERE voted_by = :user_name';
		$params = array(':user_name' => $username);
		$x = DatabaseHandler::GetAll($sql, $params);
		if(count($x) > 0)
			return 1;
		else
			return 0;
	}
	
	public static function CheckUser($user_id)
	{
		$sql = 'SELECT Count(*) as exist FROM poll.user WHERE username = :user_id';
		$params = array(':user_id' => $user_id);
		$x = DatabaseHandler::GetAll($sql, $params);
		
		if($x[0]['exist'] > 0)
			return 1;
		else
			return 0;
	}
	
	public static function AddUser($user_id)
	{
		$sql = 'INSERT INTO poll.user (username, added_on) VALUES  (:user_id, NOW())';
		$params = array(':user_id' => $user_id);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	public static function UpdateUser($user_id)
	{
		$sql = 'UPDATE poll.user SET has_voted = has_voted + 1 WHERE username = :user_id';
		$params = array(':user_id' => $user_id);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	public static function AddOrder($user_id, $quantity, $size, $gender)
	{
		$sql = 'INSERT INTO poll.order(userid, quantity, size, gender, added_on) VALUES (:user_id, :quantity, :size, :gender, NOW())';		
		$params = array(':user_id' => $user_id, ':quantity' => $quantity, ':size' => $size, ':gender' => $gender);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	public static function getOrder($user_id)
	{
		$sql = 'SELECT * FROM poll.order WHERE userid = :user_id';
		$params = array(':user_id' => $user_id);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function FindOrder($id, $user_id)
	{
		$temp = 0;
		$sql = 'SELECT * FROM poll.order WHERE id = :id AND userid = :user_id';
		$params = array(':id' => $id, ':user_id' => $user_id);
		$temp = DatabaseHandler::GetAll($sql, $params);
		if(count($temp) > 0)
			return 1;
		else
			return 0;
	}
	
	public static function DeleteOrder($id)
	{
		$sql = 'DELETE FROM poll.order WHERE id = :id';
		$params = array(':id' => $id);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
};

?>