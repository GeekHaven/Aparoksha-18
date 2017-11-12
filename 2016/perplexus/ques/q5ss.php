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
$q4score=$userRow['q4'];
if($active==0)
{
		header("Location: verify.php");
}
if($q4score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q5score=$userRow['q5'];
else if($q5score==00)
{
	header("Location: q5ns.php");
}
else if($q5score==10)
{
	?>
	your q5 score is 10
	<?php
}

?>
	
