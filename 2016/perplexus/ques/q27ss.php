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
$q26score=$userRow['q26'];
if($active==0)
{
		header("Location: verify.php");
}
if($q26score==0)
{
	?>
	You Have To First Complete The Previous Question In Order To View This Question
	<?php
}

$q27score=$userRow['q27'];
else if($q27score==00)
{
	header("Location: q27ns.php");
}
else if($q27score==10)
{
	?>
	your q27 score is 10
	<?php
}

?>
	
