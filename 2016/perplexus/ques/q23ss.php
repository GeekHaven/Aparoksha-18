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
$q22score=$userRow['q22'];
if($active==0)
{
		header("Location: verify.php");
}
if($q22score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q23score=$userRow['q23'];
else if($q23score==00)
{
	header("Location: q23ns.php");
}
else if($q23score==10)
{
	?>
	your q23 score is 10
	<?php
}

?>
	
