<?php

//load and connect to MySQL database stuff
require("config.inc.php");

if (!empty($_POST)) {
	//initial query
	$query = "INSERT INTO comments ( username, title, message ) VALUES ( :user, :title, :message ) ";

    //Update query
    $query_params = array(
        ':user' => $_POST['username'],
        ':title' => $_POST['title'],
		':message' => $_POST['message']
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
        $response["message"] = "Database Error. Couldn't add post!";
        die(json_encode($response));
    }

    $response["success"] = 1;
    $response["message"] = "Post Successfully Added!";
    echo json_encode($response);
   
} else {
?>
		<h1>Add Comment</h1> 
		<form action="addcomment.php" method="post"> 
		    Username:<br /> 
		    <input type="text" name="username" placeholder="username" /> 
		    <br /><br /> 
		    Title:<br /> 
		    <input type="text" name="title" placeholder="post title" /> 
		    <br /><br />
			Message:<br /> 
		    <input type="text" name="message" placeholder="post message" /> 
		    <br /><br />
		    <input type="submit" value="Add Comment" /> 
		</form> 
	<?php
}

?> 
