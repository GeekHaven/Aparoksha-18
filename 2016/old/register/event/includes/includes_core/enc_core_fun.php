<?php
    require_once(__DIR__."/../seed/uni_seed.php");
    
    class ENC_CORE {
	public function encrypt($val) {
	    $key = hash('sha256', APAROKSHA);
	    $iv = substr(hash('sha256', CORE_SEED), 0, 16);
	    
	    $out = openssl_encrypt($val, "AES-256-CBC", $key, 0, $iv);
	    $out = base64_encode($out);
	    return $out;
	}
	
	public function cleanString($str) {
	    $str = addslashes(htmlspecialchars(trim($str), ENT_QUOTES));
	    $str  = str_replace("<script>", "</script/>", $str);
	    $str = str_replace("'", "", $str);
	    $str = str_replace('"', '', $str);
	    return $str;
	}
    }
    
    /*$e = new ENC_REG();
    
    echo $e->encrypt('IIT2012186');
    echo '<br>';
    echo $e->encrypt('event');*/
?>