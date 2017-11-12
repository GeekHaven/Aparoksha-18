<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$active=$userRow['active'];
if($active==0)
{
		header("Location: verify.php");
}
$qs_ans = $userRow['qs_ans'];

if($qs_ans==0)
{
	header("Location: q1ns.php");
}
if($qs_ans==1)
{
	header("Location: q2ns.php");
}
if($qs_ans==2)
{
	header("Location: q3ns.php");
}

if($qs_ans==3)
{
	header("Location: q4ns.php");
}

if($qs_ans==4)
{
	header("Location: q5ns.php");
}

if($qs_ans==5)
{
	header("Location: q6ns.php");
}
if($qs_ans==6)
{
	header("Location: q7ns.php");
}
if($qs_ans==7)
{
	header("Location: q8ns.php");
}
if($qs_ans==8)
{
	header("Location: q9ns.php");
}
if($qs_ans==9)
{
	header("Location: q10ns.php");
}

if($qs_ans==10)
{
	header("Location: q11ns.php");
}

if($qs_ans==11)
{
	header("Location: q12ns.php");
}

if($qs_ans==12)
{
	header("Location: q13ns.php");
}
if($qs_ans==13)
{
	header("Location: q14ns.php");
}
if($qs_ans==14)
{
	header("Location: q15ns.php");
}

if($qs_ans==15)
{
	header("Location: q16ns.php");
}

if($qs_ans==16)
{
	header("Location: q17ns.php");
}
if($qs_ans==17)
{
	header("Location: q18ns.php");
}
if($qs_ans==18)
{
	header("Location: q19ns.php");
}

if($qs_ans==19)
{
	header("Location: q20ns.php");
}

if($qs_ans==20)
{
	header("Location: q21ns.php");
}
if($qs_ans==21)
{
	header("Location: q22ns.php");
}
if($qs_ans==22)
{
	header("Location: q23ns.php");
}

if($qs_ans==23)
{
	header("Location: q24ns.php");
}

if($qs_ans==24)
{
	header("Location: q25ns.php");
}
if($qs_ans==25)
{
	header("Location: q26ns.php");
}
if($qs_ans==26)
{
	header("Location: q27ns.php");
}

if($qs_ans==27)
{
	header("Location: q28ns.php");
}

if($qs_ans==28)
{
	header("Location: q29ns.php");
}
if($qs_ans==29)
{
	header("Location: q30ns.php");
}
if($qs_ans==30)
{
	header("Location: Leaderboard.php");
}

?>
