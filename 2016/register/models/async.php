<?php
 
$name = "";
$phone = "";
$score = "";
$valid = "";
$success = "";

if(isset($_POST['auth']) && !empty($_POST['auth']) && $_POST['auth'] == 'dsaaAsas@dsqqdf_qw121wsa') { 
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$score = $_POST['score'];
		if($name != "" && $phone != "" && $score != "") {
			$valid = 1;
			$validCaptcha = 1;			
			if ($valid == 1 && $validCaptcha == 1) {
				if (existSpaceHurdleUser($name) && $score > getScore($name)) {
					updateSpaceHurdleUser($name, $phone, $score);
				}else if (existSpaceHurdleUser($name)) {
					continue;
				} else {
					addSpaceHurdleUser($name, $phone, $score);
				}				
				$success = "Details Updated";				
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

} else {
	echo "<h1 style='color: white;position: absolute;margin: 10rem 25rem;'> Not Authorised</h1>";
}
	
?>

