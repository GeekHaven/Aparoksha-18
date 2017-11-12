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
$q29score=$userRow['q29'];
if($active==0)
{
		header("Location: verify.php");
}
if($q29score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q30score=$userRow['q30'];
else if($q30score==00)
{
	header("Location: q30ns.php");
}
else if($q30score==10)
{
	?>
	your q30 score is 10
	<?php
}

?>
	
