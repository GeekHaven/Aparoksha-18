<?php

class Logger
{
	//Table `login_sessions`
	public static function logLogin($user, $ip)
	{
		//login id and login time
		$sql = "INSERT into log_login_sessions (username, ip, login_time) VALUES (:user, :ip, NOW())";
		$params = array(':user' => $user, ':ip' => $ip);
		$result = DatabaseHandler::Execute($sql, $params);			
	}
	
	//Table `activity`
	public static function logInput($user, $action, $type, $inputstream, $ip)
	{
		// To be used for Add and Edit
		// Ex: Added Nav with {CONTENT} at NOW();	
		$sql = "INSERT into log_activity (login_id, action, type, input, ip) VALUES (:user, :action, :type, :input, :ip)";
		$params = array(':user' => $user, ':action' => $action, ':type' => $type, ':input' => $inputstream, ':ip' => $ip);
		$result = DatabaseHandler::Execute($sql, $params);	
	}
	
	public static function logToggle($user, $action, $type, $id, $ip)
	{
		// To be used for Activate, Deactivate, Delete, Upload
		// Ex: Deleted Nav with ID = 1 at NOW();
		$sql = "INSERT into log_activity (login_id, action, type, input, ip) VALUES (:user, :action, :type, :input, :ip)";
		$params = array(':user' => $user, ':action' => $action, ':type' => $type, ':input' => $id, ':ip' => $ip);
		$result = DatabaseHandler::Execute($sql, $params);
	}

};

?>