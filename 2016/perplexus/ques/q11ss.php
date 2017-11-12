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
$q10score=$userRow['q10'];
if($active==0)
{
		header("Location: verify.php");
}
if($q10score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q11score=$userRow['q11'];
else if($q11score==00)
{
	header("Location: q11ns.php");
}
else if($q11score==10)
{
	?>
	your q11 score is 10
	<?php
}

?>
	
