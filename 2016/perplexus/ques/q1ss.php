<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$active=$userRow['active'];
$q1score=$userRow['q1'];

if($q1score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}
else if($q1score==00)
{
	header("Location: q1ns.php");
}
else if($q1score==10)
{
	?>
	your q1 score is 10
	<?php
}

?>
	
