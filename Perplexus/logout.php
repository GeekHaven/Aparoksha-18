<?php
if(array_key_exists('logout',$_GET))
{
	session_start();
	unset($_SESSION['facebook_access_token']);
	session_destroy();
	header("Location: index.php");
}
?>