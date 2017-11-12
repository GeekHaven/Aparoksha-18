<?php
class Content
{
	public static function initial()
	{
		$sql = 'SELECT item_id FROM item';
		$temp = DatabaseHandler::GetAll($sql);
                print_r($temp);
		$ip = Content::getip();
		for ($i = 0; $i < count($temp); $i++) {
			$sql = 'INSERT INTO vote (voted_by, item_id, ip, date, rating) VALUES("admin", :id, :ip, NOW(), 1)';
			$params = array(':id' => $temp[$i]['item_id'], ':ip' => $ip);
			DatabaseHandler::Execute($sql, $params);
		}
		return 1;
	}
	
	public static function getip()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
			$ip=$_SERVER['HTTP_CLIENT_IP']; 
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR']; 
		} else {
			$ip=$_SERVER['REMOTE_ADDR']; 
		}
		return $ip;
	}
	
	public static function getAnItem($itemId)
	{
		$sql = 'SELECT * FROM item WHERE item_id = :item_id';
		$params = array(':item_id' => $itemId);
		return DatabaseHandler::GetAll($sql, $params);
	}
		
	public static function getItems($x)
	{
		switch($x)
		{
			case 1: $sql = 'SELECT * FROM item ORDER by item_id DESC LIMIT 0,100';
					break;
			case 2: $sql = 'SELECT * FROM item ORDER by item_id ASC LIMIT 0,100';
					break;
			case 3: $sql = 'SELECT A.*, B.votes FROM item A, (SELECT item_id, SUM(rating) as votes FROM vote GROUP BY item_id LIMIT 0, 100) B WHERE A.item_id = B.item_id ORDER BY votes ASC LIMIT 0,100;';
					break;
			default:
					$sql = 'SELECT A.*, B.votes FROM item A, (SELECT item_id, SUM(rating) as votes FROM vote GROUP BY item_id LIMIT 0, 100) B WHERE A.item_id = B.item_id ORDER BY votes DESC LIMIT 0,100;';
		}

		return DatabaseHandler::GetAll($sql);
	}
	
	public static function getItemImages()
	{
		$sql = 'SELECT * FROM item_media ORDER BY item_id LIMIT 0, 100';
		return DatabaseHandler::GetAll($sql);
	}
	
	public static function hasVoted($username)
	{
		$sql = 'SELECT * FROM vote WHERE voted_by = :user_name';
		$params = array(':user_name' => $username);
		$x = DatabaseHandler::GetAll($sql, $params);
		if(count($x) < 3)
			return 0;
		else
			return 1; 
	}
	
	public static function getNumOfVotes($userid)
	{
		$sql = 'SELECT COUNT(*) as votes FROM vote WHERE voted_by = :user_name';
		$params = array(':user_name' => $userid);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function AddVote($id, $userid)
	{
		$ip = Content::getip();
		$sql = "SELECT COUNT(*) as total FROM vote WHERE ip = :ip";
		$param = array('ip' => $ip);
		$result = DatabaseHandler::Execute($sql, $param);
		if ($result['total'] < 3) {
			$x = Content::getNumOfVotes($userid);
			switch($x[0]['votes'])
			{
				case 0: $sql = 'INSERT INTO vote (voted_by, item_id, ip, date, rating) VALUES(:user_id, :id, :ip, NOW(), 3)';
						break;
				case 1: $sql = 'INSERT INTO vote (voted_by, item_id, ip, date, rating) VALUES(:user_id, :id, :ip, NOW(), 2)';
						break;
				case 2: $sql = 'INSERT INTO vote (voted_by, item_id, ip, date, rating) VALUES(:user_id, :id, :ip, NOW(), 1)';
						break;
			}
			$params = array('user_id' => $userid, ':id' => $id, ':ip' => $ip);
			DatabaseHandler::Execute($sql, $params);
		} else {
			echo "<script type='text/javascript'>
				alert('Only 3 votes are allowed per ip');
				window.location = 'index.php';
			      </script>";
		}
		return 1;
	}
	
	public static function getCurrentVotes($id)
	{
		$sql = 'SELECT SUM(rating) as total_votes FROM vote WHERE item_id = :itemId';
		$params = array(':itemId' => $id);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function getMyVotes($user_id)
	{
		$sql = 'SELECT * FROM item WHERE item_id in (SELECT item_id FROM vote WHERE voted_by = :user_id)';
		$params = array(':user_id' => $user_id);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function getTotalVotes()
	{
		$sql = 'SELECT COUNT(*) as total_votes FROM vote';
		return DatabaseHandler::GetAll($sql);
	}
	
	public static function CheckItem($x)
	{
		$sql = 'SELECT COUNT(*) as num FROM item WHERE item_id = :x';
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
		$sql = 'SELECT * FROM vote WHERE item_id = :itemId AND voted_by = :votedBy';
		$params = array(':itemId' => $itemid, ':votedBy' => $userid);
		$temp = DatabaseHandler::GetAll($sql, $params);
		if(count($temp) > 0)
			return 1;
		else
			return 0;	
	}
	
	public static function hasVotedOne($username)
	{
		$sql = 'SELECT * FROM vote WHERE voted_by = :user_name';
		$params = array(':user_name' => $username);
		$x = DatabaseHandler::GetAll($sql, $params);
		if(count($x) > 0)
			return 1;
		else
			return 0;
	}
	
	public static function CheckUser($user_id)
	{
		$sql = 'SELECT Count(*) as exist FROM user WHERE username = :user_id';
		$params = array(':user_id' => $user_id);
		$x = DatabaseHandler::GetAll($sql, $params);
		
		if($x[0]['exist'] > 0)
			return 1;
		else
			return 0;
	}
	
	public static function AddUser($user_id)
	{
		$sql = 'INSERT INTO user (username, added_on) VALUES  (:user_id, NOW())';
		$params = array(':user_id' => $user_id);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	public static function UpdateUser($user_id)
	{
		$sql = 'UPDATE user SET has_voted = has_voted + 1 WHERE username = :user_id';
		$params = array(':user_id' => $user_id);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	public static function AddOrder($user_id, $quantity, $size, $gender, $hostel, $contact, $tshirt_type)
	{
		$sql = 'INSERT INTO orders (userid, quantity, size, gender, hostel, contact, tshirt_type, added_on) VALUES (:user_id, :quantity, :size, :gender, :hostel, :contact, :tshirt_type, NOW())';		
		$params = array(':user_id' => $user_id, ':quantity' => $quantity, ':size' => $size, ':gender' => $gender, ':hostel' => $hostel, ':contact' => $contact, ':tshirt_type' => $tshirt_type);
		DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	public static function getOrder($user_id)
	{
		$sql = 'SELECT * FROM orders WHERE userid = :user_id';
		$params = array(':user_id' => $user_id);
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	public static function FindOrder($id, $user_id)
	{
		$temp = 0;
		$sql = 'SELECT * FROM orders WHERE id = :id AND userid = :user_id';
		$params = array(':id' => $id, ':user_id' => $user_id);
		$temp = DatabaseHandler::GetAll($sql, $params);
		if(count($temp) > 0)
			return 1;
		else
			return 0;
	}
	
	public static function DeleteOrder($id)
	{
		$sql = 'DELETE FROM orders WHERE id = :id';
		$params = array(':id' => $id);
		DatabaseHandler::Execute($sql, $params);
		return;
	}

	public function isBlocked($uid)
	{
		$uid = strtolower($uid);
		$sql = "SELECT * FROM blocked WHERE uid = :uid";
		$params = array(':uid' => $uid);
		$block = DatabaseHandler::GetAll($sql, $params);
		
		if(count($block) > 0)
			return 1;
		else
			return 0;
	}
	
	public function alreadyVoteExists($item_id, $uid)
	{
		$uid = strtolower($uid);
		$sql = "SELECT * FROM vote WHERE voted_by = :uid AND item_id = :itemid";
		$params = array(':uid' => $uid, ':itemid' => $item_id);
		$list = DatabaseHandler::GetAll($sql, $params);
		
		if(count($list) > 0)
			return 1;
		else
			return 0;
	}

	public static function getUniqueVoters()
	{
		$sql = 'SELECT COUNT(DISTINCT voted_by) as unique_voters FROM vote';
		return DatabaseHandler::GetAll($sql);
	}
};

?>
