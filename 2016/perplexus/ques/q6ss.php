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
$q5score=$userRow['q5'];
if($active==0)
{
		header("Location: verify.php");
}
if($q5score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q6score=$userRow['q6'];
else if($q6score==00)
{
	header("Location: q6ns.php");
}
else if($q6score==10)
{
	?>
	your q6 score is 10
	<?php
}

?>
	
