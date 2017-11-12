<?php
    require_once(__DIR__.'/../includes_eve/enc_fun.php');
    require_once(__DIR__.'/../seed/seed.php');
    
    class ADMIN extends ENC {
	protected $seed;
	protected $dbh = null;
	protected $event = null;
	
	public function __construct($e, $d) {
            $es = $e . '';
	    
	    $this->seed = constant($es);
	    
	    $this->event = constant($e);
	    
	    if(isset($d)) $this->dbh = $d;
	    
	}
	
	public function addAns($qid, $ans) {
	    if($this->event == null || $this->seed == null || $this->dbh == null) return false;
	    
	    $qid = $this->cleanString($qid);
	    $qid = $this->encrypt($qid);
	    
	    $ans = $this->cleanString($ans);
	    $ans = $this->encrypt($ans);
	    
	    $query = "INSERT INTO `" . $this->event . "_ans`(`qid`, `answer`) VALUES (:qid, :ans)";
	    //echo $query;
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':qid', $qid, PDO::PARAM_STR);
	    $stmt->bindParam(':ans', $ans, PDO::PARAM_STR);
	    
	    if($stmt->execute()) {
		return true;
	    } else {
		print_r($stmt->errorInfo());
		return false;
	    }
	}
    }
?>