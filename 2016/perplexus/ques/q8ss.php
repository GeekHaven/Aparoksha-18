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
$q7score=$userRow['q7'];
if($active==0)
{
		header("Location: verify.php");
}
if($q7score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q8score=$userRow['q8'];
else if($q8score==00)
{
	header("Location: q8ns.php");
}
else if($q8score==10)
{
	?>
	your q8 score is 10
	<?php
}

?>
	
