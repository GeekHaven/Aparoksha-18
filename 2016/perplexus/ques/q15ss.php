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
$q14score=$userRow['q14'];
if($active==0)
{
		header("Location: verify.php");
}
if($q14score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q15score=$userRow['q15'];
else if($q15score==00)
{
	header("Location: q15ns.php");
}
else if($q15score==10)
{
	?>
	your q15 score is 10
	<?php
}

?>
	
