<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	<head>	
		<title>Aparoksha | Registeration </title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		 </script>
		<!--webfonts-->
		<link href='https//fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' ' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
		<!--webfonts-->
	</head>
	<body>	
	<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};
$fname = $lname =  $email = $cname = $mob =   $package = "";
$y=0;
 // echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";

if(isset($_POST['submit'])){
 // echo "<script type= 'text/javascript'>alert('Data  successfully Inserted.');</script>";

$hostname='localhost';
$username='gymkhanadba';
$password='gympass123';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=gymkhana",$username,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

 $x = 0;
 //echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";


  if (empty($_POST["firstname"])) {
    $firstnameErr = "First Name is required";
  } else {
    $fname = test_input($_POST["firstname"]);
    $x++;
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lastname"]);
    $x++;
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
        $x++;

  }

  if (empty($_POST["cname"])) {
    $cnameErr = "College name is reequired";
  } else {
    $cname = test_input($_POST["cname"]);
        $x++;

  }

  if (empty($_POST["mobile"])) {
    $mErr = "TopCoder ID is required";
  } else {
    $mob = test_input($_POST["mobile"]);
        $x++;
  }
  if (empty($_POST["package"])) {
    $pErr = "TopCoder ID is required";
  } else {
    $package = test_input($_POST["package"]);
        $x++;
  }

  

if($x==6)
{
$sql = "INSERT INTO aparoksha
VALUES ('".$fname."','".$lname."','".$email."','".$cname."','".$mob."','".$package."')";
if ($dbh->query($sql)) {
  $y=1;
}
else{
 echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
}
catch(PDOException $e)
{
echo $e->getMessage();
}

 
 }
?>
			<!--start-login-form-->
				<div id = "success" class = "login-head"><h1> Congrats! You have registered succesfully.<br>We will be in touch soon </h1></div>
				<div class="main">
			    	
					<div  class="wrap" id = "msform">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Aparoksha</h2>
						 	 </div>
						  	<form method = "POST"  action = "">
						  		<input type="text" name ="firstname" placeholder="First Name" required>
						  		<input type="text" name = "lastname" placeholder="Last Name" required>
						  		<input type="email" name = "email" placeholder="Email" required>
						  		<input type="text" name="cname" placeholder="College/school" required>
								<input type="number" name ="mobile" placeholder="Contact number" required>
								<select name = "package" required>
								<option value = ""> Please select the package</option>
								<option value = "1"> One day | Rs 600 </option>
								<option value = "2"> Two days | Rs 800</option>
								<option value = "3"> All 3 days | Rs 1000 </option>
								</select>
								 <div class="Remember-me">
								<div class="p-container">
								</div>
							</div>
												 
								<div class="submit">
									<input type="submit" name = "submit" value="Register >" >
								</div>
									<div class="clear"> </div>
								</div>
											
						  </form>
					</div>
					
			</div>
				<!--//End-login-form-->	
						<div class ="copy-right" style = "visibility: hidden">
							<p>Template by <a href="#">W3layouts</a></p>
						</div>
			  </div>
	</body>
	<script>	
		$(document).ready(function(){
			$('#success').hide();
		});
	</script>
	<?php
 		if($y){
	?>
	<script>
		$(document).ready(function(){
			$('#success').show();
          		$('#msform').hide();
		});
	</script>	
	<?php
		}
	?>
 
</html>


