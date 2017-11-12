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
$q16score=$userRow['q16'];
if($active==0)
{
		header("Location: verify.php");
}
if($q16score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q17score=$userRow['q17'];
else if($q17score==00)
{
	header("Location: q17ns.php");
}
else if($q17score==10)
{
	?>
	your q17 score is 10
	<?php
}

?>
	
