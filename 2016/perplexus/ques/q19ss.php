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
$q18score=$userRow['q18'];
if($active==0)
{
		header("Location: verify.php");
}
if($q18score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q19score=$userRow['q19'];
else if($q19score==00)
{
	header("Location: q19ns.php");
}
else if($q19score==10)
{
	?>
	your q19 score is 10
	<?php
}

?>
	
