<?php
    require_once(__DIR__."/enc_fun.php");
    require_once(__DIR__."/../seed/seed.php");
	
    class LEVEL extends ENC {
	protected $event = null;
	protected $seed = null;
	protected $uid = null;
	protected $dbh = null;
	protected $level = -1;
	protected $qID = null;
	protected $start_time = null;
	
	public function __construct($e, $start_time, $d, $q) {
	    if(isset($e)) {
		$this->event = constant($e);
		$s = $e . '_SEED';
		$this->seed = constant($s);
	    }
	    
	    if(isset($q)) $this->qID = $q;
	    
	    if(isset($start_time)) $this->start_time = $start_time;
	    
	    if(isset($_SESSION['uid'])) {
		$this->uid = $this->cleanString($_SESSION['uid']);
		$this->uid = $this->encrypt($this->uid);
	    }
	    
	    if(isset($d)) $this->dbh = $d;
	    
	    $this->calcLevel();
	}
	
	private function setSubmissionInvalid($qid) {
	    $query = "UPDATE `gb_submissions` SET `valid`= 1 WHERE qid = :qid AND username = :uid";
	    
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':qid', $this->encrypt_sub($qid), PDO::PARAM_STR);
	    $stmt->bindParam(':uid', $this->uid, PDO::PARAM_STR);
	    $stmt->execute();
	}
	
	private function calcLevel() {
	    if($this->event == null || $this->seed == null || $this->uid == null || $this->dbh == null || $this->qID == null) return -1;
	    
	    $level = 0;
	    
	    foreach($this->qID as $qid) {
		$query = "SELECT es.answer AS SA, ea.answer AS CA FROM `" . $this->event . "_submissions` AS es, `" . $this->event . "_ans` AS ea
			    WHERE es.qid = :qide_s AND ea.qid = :qide AND es.username = :uid AND es.valid = 0";
		
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(':qide_s', $this->encrypt_sub($qid), PDO::PARAM_STR);
		$stmt->bindParam(':qide', $this->encrypt($qid), PDO::PARAM_STR);
		$stmt->bindParam(':uid', $this->uid, PDO::PARAM_STR);
		$stmt->execute();
	    
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		    if($this->decrypt_sub($row['SA']) == $this->decrypt($row['CA'])) {
			$level = $level + 1;
		    } else {
			$this->setSubmissionInvalid($qid);
			$level = -1;
			break;
		    }
		} else {
		    break;
		}
	    }
	    
	    $this->level = $level;
	}
	
	private function checkCorrectSubmission($ans) {
	    if($this->level < 0) return false;
	    
	    $qid = $this->encrypt($this->qID[$this->level]);
	    
	    $query = "SELECT `qid`, `answer` FROM `" . $this->event . "_ans` WHERE qid = :qid";
	    
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':qid', $qid, PDO::PARAM_STR);
	    $stmt->execute();
	    
	    if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if($qid == $row['qid'] && $this->encrypt($ans) == $row['answer']) {
		    return true;
		}
	    }
	    
	    return false;
	}
	
	private function insertSubmission($ans) {
	    if($this->level < 0) return false;
	    
	    $qid = $this->encrypt_sub($this->qID[$this->level]);
	    $ans = $this->encrypt_sub($ans);
	    
	    $query = "INSERT INTO `" . $this->event . "_submissions`(`username`, `answer`, `qid`) VALUES (:uid, :ans, :qid)";
	    
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':uid', $this->uid, PDO::PARAM_STR);
	    $stmt->bindParam(':ans', $ans, PDO::PARAM_STR);
	    $stmt->bindParam(':qid', $qid, PDO::PARAM_STR);
	    
	    if($stmt->execute()) {
		return true;
	    }
	    
	    return false;
	}
	
	public function submit($ans) {
	    if($this->event == null || $this->seed == null || $this->uid == null || $this->dbh == null || $this->qID == null) return false;
	    
	    $ans = $this->cleanString_sub($ans);
	    
	    if($this->checkCorrectSubmission($ans)) {
	        if($this->insertSubmission($ans)) {
		    $this->calcLevel();
		    return 1;
		}
		return -2;
	    } else {
		return -1;
	    }
	}
	
	public function getLevel() {
	    return $this->level;
	}
	
	public function getQueDetails() {
	    if($this->event == null || $this->seed == null || $this->uid == null || $this->dbh == null || $this->qID == null) return null;
	    
	    $qid = $this->encrypt($this->qID[$this->level]);
	    
	    $query = "SELECT * FROM `" . $this->event . "_que` WHERE `qid` = :qid";
	    $stmt = $this->dbh->prepare($query);
	    $stmt->bindParam(':qid', $qid, PDO::PARAM_STR);
	    $stmt->execute();
	    
	    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		    $out = array();
		    
		    foreach ($row as $key => $value) $out[$key] = $this->decrypt($value);
		    return $out;
	    }
	    
	    return null;
	}
    }

?>