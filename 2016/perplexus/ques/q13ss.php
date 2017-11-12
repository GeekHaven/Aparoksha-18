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
$q12score=$userRow['q12'];
if($active==0)
{
		header("Location: verify.php");
}
if($q12score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q13score=$userRow['q13'];
else if($q13score==00)
{
	header("Location: q13ns.php");
}
else if($q13score==10)
{
	?>
	your q13 score is 10
	<?php
}

?>
	
