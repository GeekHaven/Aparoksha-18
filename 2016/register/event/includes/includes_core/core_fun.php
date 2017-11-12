<?php
    require_once(__DIR__."/enc_core_fun.php");
    require_once(__DIR__."/../seed/seed.php");
    
    class CORE extends ENC_CORE {
	protected $dbh = null;
	
	public function __construct($d) {
	    if(isset($d)) $this->dbh = $d;
	}
	
	public function addAdmin($event, $pwd) {
	    if($this->dbh == null) return false;
	    
	    $event = constant($event);
	    $event = $this->encrypt($event);
	    
	    $pwd = $this->cleanString($pwd);
	    $pwd = $this->encrypt($pwd);
	    
	    $query = "INSERT INTO `event_admin`(`event`, `pwd`) VALUES (:event, :pwd)";
	    
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
	    $stmt->bindParam(':event', $event, PDO::PARAM_STR);
	    
	    if($stmt->execute()) {
		return true;
	    } else {
		return false;
	    }
	}
	
	public function checkAdmin($event, $pwd) {
	    if($this->dbh == null) return false;
	    	    
	    $event = constant($event);
	    $event = $this->encrypt($event);
	    
	    $pwd = $this->cleanString($pwd);
	    $pwd = $this->encrypt($pwd);

	    
	    $query = "SELECT * FROM `event_admin` WHERE `pwd` = :pwd AND `event` = :event";
	    
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':pwd', $pwd, PDO::PARAM_STR);
	    $stmt->bindParam(':event', $event, PDO::PARAM_STR);
	    
	    if($stmt->execute()) {
		if($row = $stmt->fetch(PDO::FETCH_ASSOC))
		    return true;
	    }
	    
	    return false;
	}
    }
?>