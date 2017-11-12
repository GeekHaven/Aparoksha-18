<?php
    require("header.php");
    require("ContentSanitize.class.php");
    
    $san = new Sanitize();
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
	$email = $san->cleanString($email);
        
        $query = "SELECT * FROM `subscribe` WHERE `email` = :email";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        if($stmt->execute()) {
	    if($stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "Already subscribed for Aparoksha updates";
	    } else {
		$query = "INSERT INTO `subscribe`(`email`) VALUES (:email)";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		if($stmt->execute()) {
			echo "Sucessfully subscribed for Aparoksha updates";
		} else {
			echo "Unable to subscribe for Aparoksha updates currently. Please try after some time";
		}
	    }
	} else {
	    echo "Unable to subscribe for Aparoksha updates currently. Please try after some time";
	}
    }
?>