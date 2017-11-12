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
$q13score=$userRow['q13'];
if($active==0)
{
		header("Location: verify.php");
}
if($q13score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q14score=$userRow['q14'];
else if($q14score==00)
{
	header("Location: q14ns.php");
}
else if($q14score==10)
{
	?>
	your q14 score is 10
	<?php
}

?>
	
