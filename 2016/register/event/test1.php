<?php
    ob_start();
?>
<?php

        function encrypt($val) {
	    $key = hash('sha256', 'sex');
	    $iv = substr(hash('sha256', 'fuck'), 0, 16);
	    
	    $out = openssl_encrypt($val, "AES-256-CBC", $key, 0, $iv);
	    $out = base64_encode($out);
	    return $out;
	}
	
	function decrypt($en_val) {
	    $key = hash('sha256', 'sex');
	    $iv = substr(hash('sha256', 'fuck'), 0, 16);
	    
	    $out = openssl_decrypt(base64_decode($en_val), "AES-256-CBC", $key, 0, $iv);
	    return $out;
	}
        
        echo decrypt(encrypt('How do you feel about me..??'));
?>

<?php
    ob_end_flush();
?>