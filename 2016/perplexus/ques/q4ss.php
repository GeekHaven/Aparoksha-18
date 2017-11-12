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
$q3score=$userRow['q3'];
if($active==0)
{
		header("Location: verify.php");
}
if($q3score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q4score=$userRow['q4'];
else if($q4score==00)
{
	header("Location: q4ns.php");
}
else if($q4score==10)
{
	?>
	your q4 score is 10
	<?php
}

?>
	
