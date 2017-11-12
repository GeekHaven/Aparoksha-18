<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$ver_sent=$userRow['ver_sent'];
$ver_code=$userRow['ver_code'];
$active=$userRow['active'];
if($active==1)
{
		header("Location: home.php");
}
if($ver_sent==0)
{
	header("Location: mail.php");
}  
		
if(isset($_POST['btn-signup']))
{$vercode = mysql_real_escape_string($_POST['vercode']);
 $vercode=trim($vercode);
if($vercode==$ver_code)
{
	if(mysql_query("UPDATE users SET active=1 WHERE user_id=".$_SESSION['user']))
	{
		?>
		<script>alert('successfully verified');</script>
		<?php
		header("Location: home.php");
	}
}
else
{
	?>
	<script>alert('wrong verification code');</script>
	<?php
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/general.css" type="text/css" />
</head>
<body>
<div id="snow">
<nav>
    <ul class="nav">
        <li>
          <a href="index.php">
            <span class="icon-home"></span>
            <span class="screen-reader-text">Home</span>
          </a>
        </li></ul></nav>
<center>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">

<tr>
<td><input type="text" name="vercode" placeholder="Enter The Verification Code" required /></td>
</tr>

<tr>
<td><button type="submit" name="btn-signup">submit</button></td>
</tr>
<tr>
<td><a href="login.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>

