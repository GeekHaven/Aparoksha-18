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
$q21score=$userRow['q21'];
if($active==0)
{
		header("Location: verify.php");
}
if($q21score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q2score=$userRow['q2'];
else if($q2score==00)
{
	header("Location: q2ns.php");
}
else if($q2score==10)
{
	?>
	your q2 score is 10
	<?php
}

?>
	
