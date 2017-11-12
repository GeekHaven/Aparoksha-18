<?php


 
$email = "";
$username = "";
$passwd = "";
$cpasswd = "";
$phone = "";
$errmsg = "";
$valid = "";
$success = "";

/*if (isLogin()) {
	redirectTo(HOME);
}*/
if(isset($_POST['passwd'])) { 
	


		$email = addslashes(htmlentities(trim($_POST['email'])));
		$username = addslashes(htmlentities(trim($_POST['username'])));
		$passwd = addslashes(htmlentities($_POST['passwd']));
		$cpasswd = addslashes(htmlentities($_POST['cpasswd']));
		$phone = addslashes(htmlentities($_POST['phone']));
		if($email != "" && $username != "" && $passwd != "" && $cpasswd != "" && $phone != "") {
			$valid = registerFormValidate($email, $username, $passwd, $cpasswd, $phone);
			//captcha check here.
			/*if(CAPTCHA) {
				$privatekey = "6LeBe-gSAAAAAFUapPTQRce8OoINxje_0nnq57x5";
				$resp = recaptcha_check_answer ($privatekey,
							$_SERVER["REMOTE_ADDR"],
							$_POST["recaptcha_challenge_field"],
							$_POST["recaptcha_response_field"]);
				$validCaptcha = $resp->is_valid;
				
			} else {*/
				$validCaptcha = 1;
			
	
			if ($valid == 1 && $validCaptcha == 1) {
				addAccount($username, $passwd, $email, $phone);
				/*$response["success"] = 1;
				$response["message"] = "Username Successfully Added!";
				die(json_encode($response));*/
				if (sendAccountConfMail($username)) {
					$response["success"] = 1;
					$response["message"] = "You are Successfully Registered. A Confirmation mail has been sent to you. (Make sure to check your spam folder in your email account)";
					die(json_encode($response));
				} else {
					$response["success"] = 0;
					$response["message"] = "There's been an error while sending the Confirmation mail. We'll look into it soon. Inconvenience caused is deeply regretted.";
					die(json_encode($response));
					 
				}
				
				
				/*if ()
				activateAccount($username);
				$success = "You are Successfully Registered. Now you can login (link at bottom of page).";*/
				
				$email = "";
				$username = "";
				$passwd = "";
				$cpasswd = "";
				$phone = "";
			}
			else {
				$response["success"] = 0;
        $response["message"] = registerFormValidate($email, $username, $passwd, $cpasswd, $phone);
        
       
        die(json_encode($response));
				
			}
		} else {
			$response["success"] = 0;
        $response["message"] = "Need to enter all values!!";//registerFormValidate($_POST['email'],$_POST['username'], $_POST['password'] , $_POST['phone']);
        
       
        die(json_encode($response));
		}
	

	

}else {
	
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

<div class='form_holder' >

<div id="form_wrapper" class="form_wrapper">
	<form class="register active" role='form' action='?page=register' method='post'>
		<h3>Register</h3>
		<?php echo "<p style='margin-left:20px;margin-top:5px;	 padding:3px; color: rgb(216,71,71); line-height:20px;'>{$errmsg} </p>" ;
		echo "<p style='margin-left:20px;margin-top:5px; padding:3px; color:#74a446; line-height:20px;'>{$success} </p>";
		?>
		<div style="margin-bottom:220px;">
		<div class="column">
			<div>
				<label>Email:</label>
				<input type="text" name='email' value='<?php echo $email; ?>'/>
				<span class="error">This is an error</span>
			</div>
			<div>
				<label>Username:</label>
				<input type="text" name="username" value='<?php echo $username; ?>'/>
				<span class="error">This is an error</span>
			</div>
			
			  
		</div>
		<div class="column">
			
			<div>
				<label>Password:</label>
				<input type="password" name="passwd" value='<?php echo $passwd; ?>'/>
				<span class="error">This is an error</span>
			</div>
			<div>
				<label>Confirm Password:</label>
				<input type="password" name="cpasswd" value='<?php echo $cpasswd; ?>'/>
				<span class="error">This is an error</span>
				
			</div>
			
		</div>
		<div class="column">

			<div>
				<label>Phone No:</label>
				<input type="text" name="phone" value='<?php echo $phone; ?>'/>
				<span class="error">This is an error</span>
			</div>
		</div>
		</div>
		<!--<div style='width:340px;margin:20px auto;'>
			<?php //if (CAPTCHA) echo recaptcha_get_html($publickey);?>
		</div>-->
		<div class="bottom">
	
		      <div class="remember">
			      <input type="checkbox" checked="true"/>
			      <span>Send me updates</span>
		      </div>
		      <input type="submit" name="register" value="Register" />
		      
		      <div class="clear"></div>
	      </div>
	</form>
</div>

</div>
<?php }?>
