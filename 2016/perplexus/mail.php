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
if($active==1)
{
		header("Location: home.php");
}
else
{
$to=$userRow['user_email'];
$vercode=$userRow['ver_code'];
$subject="Verification mail from quiz arena";
$body="Your verification code is ".$vercode."\n--Regards,\nQuiz Arena";
$headers="From: quiz_arena@quizarena.xp3.biz";
if(mail($to, $subject, $body,$headers))
{
	mysql_query("UPDATE users SET ver_sent=1 WHERE user_id=".$_SESSION['user'])
	?>
	<script>alert('mail sent');</script>
	<?php
	header("Location: verify.php");
}
else
{
	?>
	<script>alert('error while sending mail ');</script>
	<?php
}
}
?>
