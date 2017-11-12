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
$q28score=$userRow['q28'];
if($active==0)
{
		header("Location: verify.php");
}
if($q28score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q29score=$userRow['q29'];
else if($q29score==00)
{
	header("Location: q29ns.php");
}
else if($q29score==10)
{
	?>
	your q29 score is 10
	<?php
}

?>
	
