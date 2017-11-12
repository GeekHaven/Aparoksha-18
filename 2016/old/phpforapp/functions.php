<?php

require("config.inc.php");
	
function registerFormValidate ($email, $username, $passwd, $phone) 
	{
	      $msg = "";
// 	      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 		   $msg = " Please Enter a valid email id.";
// 	      }
		
	      if (existAccount($username)) {
		   $msg .= " Try a different username.";
	      } 
	      if(existEmail($email)) 
		   $msg .= " Email already taken up.";
		  if (existPhone($phone)) {
		  	$msg .= " Phone number already registered.";
		  }
	      
	      else if (strlen($passwd) < 6) {
		  $msg .= " Password should be atleast 6 characters long.";
	      }
	      if($msg == "") {
		  $valid = 1;
	      }
	      else {
		  $valid = $msg;
	      }
	      
	      return $valid;
	}	
	
function existAccount($username) //Check if a username already exists
	{
	
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) == 1)
			return 1;
		return 0;
	}

function existEmail($email) //Check if a email already exists
	{
	
		$sql = "SELECT * FROM users WHERE email = :email AND isdeleted = 0";
		$params = array(':email' => $email);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) > 0)
			return 1;
		return 0;
	}

function existPhone($phone)
	{
		$sql = "SELECT user_id FROM user_details WHERE contact = :phone";
		$params = array(':phone' => $phone);
		$result = DatabaseHandler::GetAll($sql, $params);
		if (count($result) == 0) {
			return 0;
		} else {
			$sql = "SELECT isdeleted FROM users WHERE id = :id";
			$params = array(':id' => $result[0]['user_id']);
			$output = DatabaseHandler::GetAll($sql, $params);
			if ($output[0]['isdeleted'] == 1) {
				return 0;
			} else {
				return 1;
			}
		}
	}

function addAccount($username, $password, $email, $phone) //Create a new account
	{
		$code = generateCode($username, $email);
		$password = ENCRYPT . $password;
		$password = SHA1($password);
		$added_by = "admin";
		
		//Add an account
		$sql = "INSERT INTO users(username, password, code, email, added_by, added_on) VALUES(:username, :password, :code, :email, :added_by, NOW())";
		$params = array(':username' => $username, ':password' => $password, ':email' => $email, ':code' => $code, ':added_by' => $added_by);
		$result = DatabaseHandler::Execute($sql, $params);
		
		
		
		//Add empty profile for that account
		$user_id = getAccountid($username);
		$sql = "INSERT INTO user_details(user_id, contact, added_on) VALUES(:user_id, :phone, NOW())";
		$params = array(':user_id' => $user_id, ':phone' => $phone);
		$result = DatabaseHandler::Execute($sql, $params);
		
		//login time 
	//	$ip = $_SERVER['REMOTE_ADDR'];
	//	$sql = "INSERT INTO log_login_sessions(username, ip) VALUES(:username, :ip)";
	//	$params = array(':username' => $username, ':ip' => $ip);
	//	$result = DatabaseHandler::Execute($sql, $params);
		
		return;
	}	

function generateCode($username, $email) //Generate confirmation code to activate account
	{
		$str = "";
		$str = ENCRYPT. $username . $email;
		$str = SHA1($str);
		return $str;
	}

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

function getAccountid($username) //Returns ID of the selected username
	{
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result[0]['id'];
	}	
	
function getidbyEvent($event)
	{
		$sql = "SELECT * FROM events WHERE id = :event_id AND isdeleted = 0";
		$sql = "SELECT * FROM events WHERE  AND isdeleted = 0";
		$params = array(':event_id' => $event_id);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}	
	
	
?>