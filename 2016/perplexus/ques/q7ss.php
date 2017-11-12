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
$q6score=$userRow['q6'];
if($active==0)
{
		header("Location: verify.php");
}
if($q6score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q7score=$userRow['q7'];
else if($q7score==00)
{
	header("Location: q7ns.php");
}
else if($q7score==10)
{
	?>
	your q7 score is 10
	<?php
}

?>
	
