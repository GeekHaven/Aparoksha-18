<?php
	
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
		// last request was more than 30 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
	}
	$_SESSION['LAST_ACTIVITY'] = time(); 
	
	function logged_in() {
		return (isset($_SESSION['_iiita_cms_username_']));
	}
	
	function confirm_logged_in() {
		if(!logged_in()) {
				//header("Location:/cms");
		}
	}
?>
