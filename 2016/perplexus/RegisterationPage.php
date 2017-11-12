<?php
session_start();
if(isset($_SESSION['user'])!="")
{
  header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
  $uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$first_name = mysql_real_escape_string($_POST['first_name']);
	$last_name = mysql_real_escape_string($_POST['last_name']);
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$first_name = trim($first_name);
	$last_name = trim($last_name);
  
  // email exist or not
  $query = "SELECT user_email FROM users WHERE user_email='$email'";
  $result = mysql_query($query);
  
  $count = mysql_num_rows($result); // if email not found then register
  
  if($count == 0){
    
    if(mysql_query("INSERT INTO users(user_name,user_email,user_pass,first_name,last_name) VALUES('$uname','$email','$upass','$first_name','$last_name')"))
    {
      ?>
      <script>alert('successfully registered ');</script>
      <?php
    }
    else
    {
      ?>
      <script>alert('error while registering you...');</script>
      <?php
    }   
  }
  else{
      ?>
      <script>alert('Sorry Email ID already taken ...');</script>
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

 <nav class="grey" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
        <li><a href = "#">Link 2</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      
    </form>
  </div>

  
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<script src = "JS/1.js"> </script>
</body>
</html>


