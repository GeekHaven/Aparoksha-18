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
$q15score=$userRow['q15'];
if($active==0)
{
		header("Location: verify.php");
}
if($q15score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q16score=$userRow['q16'];
else if($q16score==00)
{
	header("Location: q16ns.php");
}
else if($q16score==10)
{
	?>
	your q16 score is 10
	<?php
}

?>
	
