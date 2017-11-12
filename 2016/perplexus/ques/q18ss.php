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
$q17score=$userRow['q17'];
if($active==0)
{
		header("Location: verify.php");
}
if($q17score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q18score=$userRow['q18'];
else if($q18score==00)
{
	header("Location: q18ns.php");
}
else if($q18score==10)
{
	?>
	your q18 score is 10
	<?php
}

?>
	
