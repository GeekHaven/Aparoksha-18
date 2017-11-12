<?php
    require_once(__DIR__."/enc_reg_fun.php");
    require_once(__DIR__."/../seed/seed.php");
    
    class REGISTER extends ENC_REG {
	protected $dbh = null;
	
	public function __construct($d) {
	    $this->dbh = $d;
	}
	
	public function addPart($event, $uid) {
	    //$event = constant($event);
	    //$event = $this->encrypt($event);
	    
	    //$uid = $this->cleanString($uid);
	    ///$uid = $this->encrypt($uid);
	    
	    $query = "INSERT INTO `event_part`(`event`, `uid`) VALUES (:eve, :uid)";
	    
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':eve', $event, PDO::PARAM_STR);
	    $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
	    
	    if($stmt->execute()) {
		return true;
	    } else {
		return false;
	    }
	}
    }
	
	
	
?>