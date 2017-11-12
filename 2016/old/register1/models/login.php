<?php
$username = "";
$pass = "";
$msg = "";
$logout = "";
$val="";
/*
if(isset($_GET['val'])) {
	if($_GET['val'] == 1)
		$val = "Your Account is activated now you can Login with your credentials.";
}

if(isLogin()) {
 	redirectTo(HOME);
}*/

if(isset($_GET['logout'])) {
	$logout = "Your are successfully logged out.";
}

if(isset($_POST['pass'])) {
	$username = $_POST['user'];
	$pass = $_POST['pass'];
	
	if (authenticate($username, $pass)) {
		
		$response["success"] = 1;
		$response["message"] = "Logged in Successfully!";
		die(json_encode($response));
	} else {
		$response["success"] = 0;
        $response["message"] = "Invalid Credentials!!";
		die(json_encode($response));
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
        <li>Registration Cost</li>
          <ol type="i" class="subRules">
            <li>&#8377;500/-  1 day</li>
            <li>&#8377;600/-  2 days</li>
            <li>&#8377;700/-  3 days</li>
          </ol>
          &#42; &#8377;150/- less for School Students in each category

        <li>Discounts (based on group size)</li>
          <ol type="i" class="subRules">
            <li><pre> 5-10  10%</pre></li>
            <li><pre>10-15  15%</pre></li>
            <li><pre>15-25  25%</pre></li>
          </ol>
        <li>For more details, Contact:</li>
          <ol type="i" class="subRules">
            <li><pre>Amit Kushwaha    +91-(856)-484-5988</pre></li>
            <li><pre>Siddharth Verma  +91-(896)-026-8411</pre></li>
            <li><pre>Sushant Saurabh  +91-(789)-735-6101</pre></li>
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