<?php

require_once("config/config.php");

require_once("models/database.php");

require_once("api/contentFunctions.php");
require_once("api/sessionFunctions.php");
require_once('api/mailFunctions.php');

require_once("business/Database_handler.class.php");
require_once("business/Link.class.php");

function getInactiveUsers() {
	$sql = "SELECT * FROM `users` WHERE isactive=0 AND isdeleted=0";
	$result = DatabaseHandler::GetAll($sql);
	return $result;
}

$iUsers = getInactiveUsers();

for($i = 0; $i < count($iUsers); $i++) {
	echo $iUsers[$i]['email'] . "<br/>";
	
	sendAccountConfmail($iUsers[$i]['username']);
//	sendAccountConfmail('test');
}

?>
