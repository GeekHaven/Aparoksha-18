<?php
 
$email = "";
$username = "";
$passwd = "";
$cpasswd = "";
$phone = "";
$errmsg = "";
$valid = "";
$success = "";

if (isLogin()) {
	redirectTo(HOME);
}
if(isset($_POST['register'])) { 
	


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
				if (sendAccountConfMail($username)) {
					$success = "You are Successfully Registered. A Confirmation mail has been sent to you. (Make sure to check your spam folder in your email account)";
				} else {
					$errmsg = "There's been an error while sending the Confirmation mail. We'll look into it soon. Inconvenience caused is deeply regretted.";
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
				if($valid != 1)
					$errmsg = $valid;
				if(!$validCaptcha) {
					$errmsg .= " Captcha is incorrect.";
				}
			}
		} else {
			$errmsg = "Fill in Complete Form. All Fields are Necessary.";
		}
	

	

}
	
?>





<div id="reg" >
    <form class="col s8" role='form' action='?page=register' method='post'>
      <div class="row"  style="color:white;margin-top:5rem;">
	  
<p style="color:white;font-size:35px; font-family:Cursive;margin-left:190px;">Register</p>

	  </div>
		<?php if($success != "") die($success); 
			if($errmsg != "") echo $errmsg; 
		?>
	<?php /* <div class="success" style="margin-bottom:20px;" >Registration successful. Please verify your email address to proceed further. </div>
	  
	  <div class="error" id="firstd">First name is required.(Min. length 4)</div>
	  <div class="error" id="lastd">Last name is required.(Min. length 4)</div>
	  <div class="error" id="emaild">Email is required.</div>
	  <div class="error" id="usernamed">Please enter a username.(Min. length 4)</div>
	  <div class="error" id="passd">Confirmed password does not match.</div>
	  <div class="error" id="passdd">Please enter a password with minimum length of eight.</div>
	  <div class="error" id="instituted">Please enter your institute name.(Min. length 4)</div>
	  <div class="error" id="mobiled">Please enter a valid mobile number.</div> */ ?>
	  
		<div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix" style="color:white;">email</i>
          <input id="icon_prefix3" type="text" name="email" required="required" type="email" style="color:white;" class="validate">
          <label for="icon_prefix3" style="color:white;" >Email</label><div id="messagee"></div>
        </div>
		<div class="input-field col s6">
          <i class="material-icons prefix" style="color:white;">perm_identity</i>
          <input id="icon_prefix55" type="text" name="username" required="required"  style="color:white;" class="validate">
          <label for="icon_prefix55" style="color:white;" >Username</label><div id="message"></div>
        </div>
       <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix" style="color:white;">dashboard</i>
          <input id="icon_prefix4" name="passwd" required="required" type="password" style="color:white;" class="validate">
          <label for="icon_prefix4" style="color:white;" >Password</label>
        </div>
		<div class="input-field col s6">
          <i class="material-icons prefix" style="color:white;">dashboard</i>
          <input id="icon_prefix5" name="cpasswd" required="required" type="password" style="color:white;" class="validate">
          <label for="icon_prefix5" style="color:white;" >Confirm Password</label>
        </div>
       </div>
	     <div class="row">
        
		<div class="input-field col s6">
          <i class="material-icons prefix" style="color:white;">phone</i>
          <input id="icon_prefix0" type="tel" name="phone" style="color:white;" required="required"  class="validate">
          <label for="icon_prefix0" style="color:white;">Mobile</label><div id="messagem"></div>
        </div>
		<div class="col s6" style="margin-left:0px">
		<button class="btn waves-effect waves-light" type="submit" name="register" value="Register">Register
    <i class="material-icons right">send</i>
  </button>
</div>
       </div>
		
       </div>
	   
       
       
	  <div class="re" style="margin-left:70px;">
	  Already have an account? Click
	  <a href="?page=login.php" <?php //onclick="switchVisible();"?>>here</a> to login.
	  <br/><br/><br/></div>
	 
    </form>
	</div>

