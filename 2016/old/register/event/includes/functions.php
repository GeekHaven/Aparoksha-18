<?php    
    function encryption($username, $type) {
	$fingerprint = $type . md5($_SERVER['HTTP_USER_AGENT']);
	return $salt = $fingerprint . session_id();
    }
?>
