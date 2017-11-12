<?php
	require_once(__DIR__."/../includes_reg/enc_reg_fun.php");
	require_once(__DIR__."/../seed/seed.php");
	
	class Login extends ENC_REG {
		protected $event = null;
		protected $seed = null;
		protected $uid = null;
		protected $dbh = null;
		protected $start_time = null;
		protected $end_time = null;
		
		public function __construct($e, $st, $et, $d) {
			if(isset($e)) {
				$this->event = constant($e);
				$this->event = $this->encrypt($this->event);
			}
			
			if(isset($st)) $this->start_time = $st;
			if(isset($et)) $this->end_time = $et;
			
			if(isset($_SESSION['uid'])) {
				$this->uid = $this->cleanString($_SESSION['uid']);
				$this->uid = $this->encrypt($this->uid);
			}
			
			if(isset($d)) $this->dbh = $d;
		}
	    
		public function isParticipant() {
			if($this->event == null ||  $this->uid == null || $this->dbh == null) return false;
			
			$query = "SELECT * FROM event_part WHERE uid = :username AND event = :event";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(':username', $this->uid, PDO::PARAM_STR);
			$stmt->bindParam(':event', $this->event, PDO::PARAM_STR);
			$stmt->execute();
			
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				return true;
			
			}
			return false;
		}
		
		public function isLogin() {
			//Login Check
			if (isset($_SESSION['uid']) && isset($_SESSION['type']) && isset($_SESSION['crypted'])) {
				return true;
			}    
			return false;
		}
		
		public function isEventStarted() {
			return date('Y-m-d H:i:s') > $this->start_time;
		}
		
		public function isEventEnded() {
			return date('Y-m-d H:i:s') > $this->end_time;
		}
	}
?>