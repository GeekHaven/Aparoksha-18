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
if($active==0)
{
		header("Location: verify.php");
}
$q13score=$userRow['q13'];
$q14score=$userRow['q14'];
if($q13score==0)
{
	header("Location: next.php");
}
else if($q14score==10)
{
	header("Location: q14ss.php");
}


$ques=mysql_query("SELECT * FROM ques WHERE ques_id=2");
$quesRow=mysql_fetch_array($ques);
$q14=$quesRow['q_ans'];

if(isset($_POST['q14_submit']))
{
	$q14_ans = mysql_real_escape_string($_POST['q14_ans']);
	$q14_ans=trim($q14_ans);
	$q14_ans=md5($q14_ans);
	$q14_ans=trim($q14_ans);

	if($q14_ans==$q14)
	{
		$q14_score=10;
		if(mysql_query("UPDATE users SET q14=10 , score=score+10 WHERE user_id=".$_SESSION['user']))
    		{
      			?>
      			<script>alert('successfully submitted');</script>
      			<?php
			header("Location: q14ss.php");
    		}
		else
		{
			?>
      			<script>alert('query problem');</script>
      			<?php	
		}
	}
	else
	{
		
      			?>
      			<script>alert('wrong answer');</script>
      			<?php
	}	
}	
		
?>
<html>
<head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>

  <div id="test1" class="col s12 m9 l10"><br>
	<h2> This Is q14 </h2>
        <img class="materialboxed initialized" height="400" width="650" src="images/sample-1.jpg" ><br>
	       
	<div class="row">
    <form method="post" class="col s12">
      <div class="row">
        <div class="input-field col s12 m3">
          <input placeholder="Enter text" id="q14_ans" name="q14_ans" type="text" class="validate">
          <label for="q14_ans">Answer</label>
        </div>
 <button class="btn waves-effect waves-light btn-large" type="submit" name="q14_submit">Submit
    <i class="material-icons right">send</i>
  </button>
  </div>
    </form>
  </div>

