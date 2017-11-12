<?php
$username = "";
$pass = "";
$msg = "";
$logout = "";
$val="";
//$_SESSION['eve']="";

if(isset($_GET['val'])) {
	if($_GET['val'] == 1)
		$val = "Your Account is activated now you can Login with your credentials.";
}

if(isset($_POST['q'])) {
	$_SESSION['eve'] = $_POST['q']."_eve";
	
}

//echo $_SESSION['eve'];

if(isLogin()) {
 	redirectTo(HOME);
}

if(isset($_GET['logout'])) {
	$logout = "Your are successfully logged out.";
}

if(isset($_POST['login'])) {
	$username = $_POST['user'];
	$pass = $_POST['pass'];
	
	if (authenticate($username, $pass) && !isset($_SESSION['eve'])) {
		
		redirectTo(HOME);
	} else if(authenticate($username, $pass) && isset($_SESSION['eve'])) {
		redirectTo(constant($_SESSION['eve']));
		//echo "set".;
	}
	else {
		$msg = "Incorrect Login Credentials";
	}
}

?>

<!--Rules to be displayed at the side-->
<style type="text/css">
	#ftr{
		position: absolute !important;
		bottom: 0 !important;
	}
</style>

<div class="rulesOuter">
      <h2>Registration Details</h2>
      <ol class="rules">
        <li>Normal Registeration</li>
          <ol type="i" class="subRules">
            <li>&#8377;250/-  1 day</li>
            <li>&#8377;400/-  2 days</li>
            <li>&#8377;600/-  3 days</li>
          </ol>

        <li>For CodeShow (Onsite) Selected teams</li>
          <ol type="i" class="subRules">
            <li>&#8377;600 for a team of 3 for 1 days.</li>
            <li>&#8377;800 for a team of 3 for 2 days.</li>
            <li>&#8377;1000 for a team of 3 for 3 days.</li>
          </ol>
        <li>For more details, Contact:</li>
          <ol type="i" class="subRules">
            <li><pre>Deepanshu Upadhyay<br>+91-(896)-027-6568</pre></li>
          </ol>
      </ol>
</div>

<div class='form_holder'>
<div id="form_wrapper" class="form_wrapper" style="margin-left:42%">
<form class="login active" role='form' action='?page=login' method='post'>
	<h3>Login</h3>
	<?php echo "<p style='margin-left:20px;margin-top:5px;	 padding:3px; color: rgb(216,71,71); line-height:20px;'>{$msg} </p>" ;	
		echo "<p style='margin-left:20px;margin-top:5px;	 padding:3px;color:#ffa800; line-height:20px;'>{$logout} </p>";
		echo "<p style='margin-left:20px;margin-top:5px;	 padding:3px;color:#659131;font-size:13px; line-height:20px;'>{$val} </p>";
	?>
	<div>
		<label>Username:</label>
		<input type="text" name='user' value='<?php echo $username; ?>'/>
		<span class="error">This is an error</span>
	</div>
	<div>
		<label>Password:</label>
		<input type="password" name='pass' value='<?php echo $pass; ?>' />
		<span class="error">This is an error</span>
	</div>
	<div class="bottom">
		<div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
		<input type="submit" name="login" value="Login"></input>
		<div class="clear"></div>
	</div>
</form>
</div>
</div>