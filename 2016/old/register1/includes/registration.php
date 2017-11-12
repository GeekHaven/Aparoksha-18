<?php
require_once('config.inc.php');

require_once(__DIR__."/../event/includes/seed/uni_seed.php");
require_once(__DIR__."/../event/includes/seed/seed.php");
    
    
	function getAccountid($username) //Returns ID of the selected username
	{
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		
		try{$stmt = $db->prepare($sql);
		
	    
		$result = $stmt->execute($params);}catch(PDOException $e){ echo $e;}
		return $result[0]['id'];
	}
	
	function addPart($event, $uid) {
		
	    $event = constant($event);
	    $event = encrypt($event);
	    
	    $uid = cleanString($uid);
	    $uid = encrypt($uid);
	    
	    $query = "INSERT INTO event_part(event, uid) VALUES (:eve, :uid)";
		echo "Event:".$event."<br>Username:".$uid;
	    /*$stmt = prepare($query);
	    $stmt->bindParam(':eve', $event, PDO::PARAM_STR);
	    $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);*/
		$params = array(':eve' => $event, ':uid' => $uid);
		try {
		
		$stmt = $db->prepare($query);
		
		$result = $stmt->execute($params);
		echo "true";
		} catch (PDOException $e){
			echo $e;
		}
	    echo "exec";
	    /*if($stmt->execute()) {
		echo "true";
		return true;
	    } else {
		echo "fals3e";
		return false;
	    }*/
	}
    
    
	function encrypt($val) {
	    $key = hash('sha256', APAROKSHA);
	    $iv = substr(hash('sha256', APAROKSHA_SEED), 0, 16);
	    
	    $out = openssl_encrypt($val, "AES-256-CBC", $key, 0, $iv);
	    $out = base64_encode($out);
	    return $out;
	}
	
	function cleanString($str) {
	    $str = addslashes(htmlspecialchars(trim($str), ENT_QUOTES));
	    $str  = str_replace("<script>", "</script/>", $str);
	    $str = str_replace("'", "", $str);
	    $str = str_replace('"', '', $str);
	    return $str;
	}
    

if(isset($_POST['username'])){
	$user = $_POST['username'];
	//$userid = getAccountid($user);
	$regval=$_POST['event'];
	
	$user = getAccountid($user);
	echo "USER:".$user."<br>EVent:".$regval."<br>";
				if(addPart($regval, $user)){
					echo $user;
					//$registerscs = "<p style='color:#74a446; font-size:15px;' > You have successfully registered to the Event! </p>";
					$response["success"] = 1;
					$response["message"] = "Registered!";
					die(json_encode($response));
				}else {
					//$registerscs = "<p style='color:#74a446; font-size:15px;' > Sorry!! You COuldnote be registered</p>";
					$response["success"] = 0;
					$response["message"] = "Error occured!";
					die(json_encode($response));
				}
			
	
} else {
	$response["success"] = 0;
	$response["message"] = "Username Not Set";
	//die(json_encode($response));

?>
<html>
<body>
<form method="POST" action="registration.php">
	<input name="event" type="text"/>
	<input name="username" type="text"/>
	<input type="submit"/>
</form>
</body>
</html>
<?php } ?>

