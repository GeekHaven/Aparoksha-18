<?php
	
	function authenticate($username, $password) //Check authentication
	{
		$passwordcrypt = ENCRYPT . $password;
		$passwordcrypt = SHA1($passwordcrypt);
		$sql = "SELECT * FROM users WHERE username = :username AND password = :password AND isactive = 1 AND isdeleted = 0";
		$params = array(':username' => $username, ':password' => $passwordcrypt);
		$result = DatabaseHandler::GetAll($sql, $params);
		
		if(count($result) > 0) {
			setSession($username);
			return 1;
		}
		return 0;
	}
	
	function setSession ($username) {
		$_SESSION['user'] = $username;
		$_SESSION['loginIdentifier'] = 1;
		logLogin();
	}
	
	function isLogin() 
	{
		if(isset($_SESSION['loginIdentifier']))
			if($_SESSION['loginIdentifier'])
				return 1;
		return 0;
	}
	
	function logLogin() {
		if(isset($_SESSION['user'])) {
			$username =$_SESSION['user'];
			$ip  = $_SERVER['REMOTE_ADDR'];
		//	$sql = "UPDATE log_login_sessions SET ip=:ip, login_time=NOW() WHERE username=:username ";
			$sql = "INSERT INTO `log_login_sessions`( `username`, `ip`, `login_time`) VALUES (:username, :ip, NOW())";
			$params = array(':username' => $username, ':ip' => $ip);
		
			$result = DatabaseHandler::Execute($sql, $params);
		}
	}
	
	function adminauthenticate($username, $password) //Check admin authentication
	{
		$passwordcrypt = ENCRYPT . $password;
		$passwordcrypt = SHA1($passwordcrypt);
		//die($passwordcrypt);
		$sql = "SELECT * FROM admin_usr WHERE username = :username AND password = :password AND isactive = 1 AND isdeleted = 0";
		$params = array(':username' => $username, ':password' => $passwordcrypt);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) > 0) {
			return 1;
		}
		return 0;
	}
	
	function isAdminLogin() 
	{
		if(isset($_SESSION['loginAdminIdentifier']))
			if($_SESSION['loginAdminIdentifier'])
				return 1;
		return 0;
	}
	
	function logAdminLogin() {
		$username =$_SESSION['admin'];
		$ip  = $_SERVER['REMOTE_ADDR'];
		$sql = "UPDATE log_login_sessions SET ip=:ip, login_time=NOW() WHERE username=:username ";
		$params = array(':username' => $username, ':ip' => $ip);
		
		$result = DatabaseHandler::Execute($sql, $params);
	}
?>
