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
$q20score=$userRow['q20'];
if($active==0)
{
		header("Location: verify.php");
}
if($q20score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q21score=$userRow['q21'];
else if($q21score==00)
{
	header("Location: q21ns.php");
}
else if($q21score==10)
{
	?>
	your q21 score is 10
	<?php
}

?>
	
