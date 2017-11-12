<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user'])!="")
{
	header("Location: HomePage.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$active=$userRow['active'];
if($active==0)
{
		header("Location: verify.php");
}

$q2score=$userRow['q2'];
if($q2score==00)
{
	header("Location: q2ns.php");
}
?>
your q2 score is 10	
