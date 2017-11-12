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
$q27score=$userRow['q27'];
if($active==0)
{
		header("Location: verify.php");
}
if($q27score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q28score=$userRow['q28'];
else if($q28score==00)
{
	header("Location: q28ns.php");
}
else if($q28score==10)
{
	?>
	your q28 score is 10
	<?php
}

?>
	
