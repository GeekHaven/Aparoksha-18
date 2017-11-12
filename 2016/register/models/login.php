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


<form class="col s6" method="POST" action="?page=login">
      <div class="row" style="color:white;margin-top:5rem;">
	  
<p style="color:white;font-size:35px; font-family:Roboto;margin-left:130px;">Login</p>

	  </div>
	  <div class="row" style="font-color:white;">
        <div class="input-field col s12">
	  <i class="material-icons prefix" style="color:white;">perm_identity</i>
          <input  id="first_name" type="text" required="required" name="user" style="color:white;" class="validate" >
          <label for="first_name" style="color:white;">User Name</label>
        </div>
              </div>
      <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix" style="color:white;">dashboard</i>
		<input id="email" name="pass" required="required" type="password" style="color:white;" class="validate">
         	 <label for="email" style="color:white;">Password</label>
        </div>
      </div>
	   <button class="btn waves-effect waves-light" type="submit" name="login">Login
    <i class="material-icons right">send</i>
  </button>
    </form>
 


