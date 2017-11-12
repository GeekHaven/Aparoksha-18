<?php
    require_once(__DIR__."/../seed/uni_seed.php");
    
    class ENC {
	public function encrypt($val) {
	    $key = hash('sha256', $this->seed);
	    $iv = substr(hash('sha256', APAROKSHA_SEED), 0, 16);
	    
	    $out = openssl_encrypt($val, "AES-256-CBC", $key, 0, $iv);
	    $out = base64_encode($out);
	    return $out;
	}
	
	public function decrypt($en_val) {
	    $key = hash('sha256', $this->seed);
	    $iv = substr(hash('sha256', APAROKSHA_SEED), 0, 16);
	    
	    $out = openssl_decrypt(base64_decode($en_val), "AES-256-CBC", $key, 0, $iv);
	    return $out;
	}
	
	function encrypt_sub($val) {
	    $key = hash('sha256', $this->seed);
	    $iv = substr(hash('sha256', $this->uid), 0, 16);
	    
	    $out = openssl_encrypt($val, "AES-256-CBC", $key, 0, $iv);
	    $out = base64_encode($out);
	    
	    return $out;
	}
	
	function decrypt_sub($en_val) {
	    $key = hash('sha256', $this->seed);
	    $iv = substr(hash('sha256', $this->uid), 0, 16);
	    
	    $out = openssl_decrypt(base64_decode($en_val), "AES-256-CBC", $key, 0, $iv);
	    return $out;
	}
	
	public function cleanString($str) {
	    $str = addslashes(htmlspecialchars(trim($str), ENT_QUOTES));
	    $str = str_replace("<script>", "</script/>", $str);
	    $str = str_replace("'", "", $str);
	    $str = str_replace('"', '', $str);
	    return $str;
	}
	
	public function cleanString_sub($str) {
	    $str = strtolower($str);
	    $str = addslashes(htmlspecialchars(trim($str), ENT_QUOTES));
	    $str = str_replace("<script>", "</script/>", $str);
	    $str = str_replace("'", "", $str);
	    $str = str_replace('"', '', $str);
	    $str = str_replace(' ', '', $str);
	    return $str;
	}
    }
?>