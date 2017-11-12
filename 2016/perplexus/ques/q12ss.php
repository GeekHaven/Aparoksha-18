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
$q11score=$userRow['q11'];
if($active==0)
{
		header("Location: verify.php");
}
if($q11score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q12score=$userRow['q12'];
else if($q12score==00)
{
	header("Location: q12ns.php");
}
else if($q12score==10)
{
	?>
	your q12 score is 10
	<?php
}

?>
	
