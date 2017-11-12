<?php

/*
Our "config.inc.php" file connects to database every time we include or require
it within a php script.  Since we want this script to add a new user to our db,
we will be talking with our database, and therefore,
let's require the connection to happen:
*/
require("config.inc.php");
require("functions.php");


//if posted data is not empty
if (!empty($_POST)) {
    
    if (empty($_POST['username']) || empty($_POST['password'] )) {   //working here
        
        
        // Create some data that will be the JSON response 
        $response["success"] = 0;
        $response["message"] = "Please Enter Both a Username and Password.";
        
       
        die(json_encode($response));
    }
    
	if(1){//registerFormValidate($_POST['email'],$_POST['username'], $_POST['password'] , $_POST['phone']) == 1 ) {
		
		$code = generateCode($_POST['username'], $email);
		$password = ENCRYPT . $_POST['password'];
		$email = $_POST['email'];
		$password = SHA1($password);
		$added_by = "admin";
		$sql = "INSERT INTO users(username, password, code, email, added_by, added_on) VALUES(:username, :password, :code, :email, :added_by, NOW())";
		$params = array(':username' => $_POST['username'], ':password' => $password, ':email' => $email, ':code' => $code, ':added_by' => $added_by);
		try {
		$stmt = $db->prepare($sql);
		$result = $stmt->execute($params);
		} catch (PDOException $e){
			echo $e;
			}
		//addAccount($_POST['username'],$_POST['password'],"abcdefghj","1234566");
		
		
		//echo "hello";
		
		$response["success"] = 1;
		$response["message"] = "Username Successfully Added!";
		die(json_encode($response));
		
	
	} else {
		$response["success"] = 0;
        $response["message"] = "failed";//registerFormValidate($_POST['email'],$_POST['username'], $_POST['password'] , $_POST['phone']);
        
       
        die(json_encode($response));
		
	}
    
  /*  $query        = " SELECT 1 FROM users WHERE username = :user";
    //now lets update what :user should be
    $query_params = array(
        ':user' => $_POST['username']
    );
    
   
    try {
       
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        
        
        //or just use this use this one to product JSON data:
        $response["success"] = 0;
        $response["message"] = "Database Error1. Please Try Again!";
        die(json_encode($response));
    }
    
   
    $row = $stmt->fetch();
    if ($row) {
        
        $response["success"] = 0;
        $response["message"] = "I'm sorry, this username is already in use";
        die(json_encode($response));
    }
    
    
    $query = "INSERT INTO users ( username, password ) VALUES ( :user, :pass ) ";
    
   
    $query_params = array(
        ':user' => $_POST['username'],
        ':pass' => $_POST['password']
    );
    
   
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
       
        $response["success"] = 0;
        $response["message"] = "Database Error2. Please Try Again!";
        die(json_encode($response));
    }
    
    
    $response["success"] = 1;
    $response["message"] = "Username Successfully Added!";
    echo json_encode($response);
    
    
 */   
    
} else {
?>
	<h1>Register</h1> 
	<form action="register.php" method="post"> 
	    Username:<br /> 
	    <input type="text" name="username" value="" /> 
	    <br /><br /> 
	    Password:<br /> 
	    <input type="password" name="password" value="" /> 
	    <br /><br /> 
	    <input type="submit" name= "yup" value="Register New User" /> 
	</form>
	<?php
}

?>
