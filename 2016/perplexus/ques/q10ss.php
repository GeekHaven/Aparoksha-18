<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{s
	header("Location: index.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$active=$userRow['active'];
$q1score=$userRow['q1'];
if($active==0)
{
		header("Location: verify.php");
}
if($q1score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q10score=$userRow['q10'];
else if($q10score==00)
{
	header("Location: q10ns.php");
}
else if($q10score==10)
{
	?>
	your q10 score is 10
	<?php
}

?>
	
