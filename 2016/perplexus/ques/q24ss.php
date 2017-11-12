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
$q23score=$userRow['q23'];
if($active==0)
{
		header("Location: verify.php");
}
if($q23score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q24score=$userRow['q24'];
else if($q24score==00)
{
	header("Location: q24ns.php");
}
else if($q24score==10)
{
	?>
	your q24 score is 10
	<?php
}

?>
	
