<?php

//load and connect to MySQL database stuff
require("config.inc.php");
require("functions.php");

if (!empty($_POST)) {
	
	$id = getAccountid($_POST['username'] );
	
	
	
	
	$query1 = "select * from event_register where username  = :user and event_name = :event " ; 
		
	
	
	$query1_params = array(
	':user' => $_POST['username'],
        ':event' => $_POST['event']
	);
		
	try {
        $stmt1   = $db->prepare($query1);
        $result1 = $stmt1->execute($query1_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Database Error. Couldn't Register!";
        die(json_encode($response));
    }	
	
	 $row = $stmt1->fetch();
    if ($row) {
       $response["success"] = 0;   // if the user already registered
        $response["message"] = "Already registered to the event!";
        die(json_encode($response));
    }
	
	//initial query
	$query = "INSERT INTO event_register ( username, event_name ) VALUES ( :user, :eventname ) ";

    //Update query
    $query_params = array(
        ':user' => $_POST['username'],
        ':eventname' => $_POST['event']
    );
  
	//execute query
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Database Error. Couldn't Register!";
        die(json_encode($response));
    }

    $response["success"] = 1;
    $response["message"] = "Registered Successfully!";
    echo json_encode($response);
   
} else {
?>
		<h1>Register here </h1> 
		<form action="eventregister.php" method="post"> 
		    Username:<br /> 
		    <input type="text" name="username" placeholder="username" /> 
		    <br /><br /> 
		    Title:<br /> 
		    <input type="text" name="event" placeholder="post title" /> 
		    <br /><br />
			
		    <input type="submit" value="Add Comment" /> 
		</form> 
	<?php
}

?> 
