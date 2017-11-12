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
$q8score=$userRow['q8'];
if($active==0)
{
		header("Location: verify.php");
}
if($q8score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q9score=$userRow['q9'];
else if($q9score==00)
{
	header("Location: q9ns.php");
}
else if($q9score==10)
{
	?>
	your q9 score is 10
	<?php
}

?>
	
