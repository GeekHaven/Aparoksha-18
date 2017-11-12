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
			
			if(isset($_SESSION['user'])) {

				$this->uid = $this->cleanString($_SESSION['user']);
				$this->uid = $this->encrypt($this->uid);
			}
			
			if(isset($d)) $this->dbh = $d;
		}
		public function show_id() {
			return $this->event." ".$this->uid;
		}
	    
		public function isParticipant() {
			if($this->event == null ||  $this->uid == null || $this->dbh == null) echo "false";
			
			$query = "SELECT * FROM event_part WHERE uid = :username AND event = :event";
			return true;
			//return $this->event;
			/*$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(':username', $this->uid, PDO::PARAM_STR);
			$stmt->bindParam(':event', $this->event, PDO::PARAM_STR);
			$stmt->execute();
			
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				//echo "registered";
				return true;
			
			}
			return false;*/
		}
		
		public function isLogin() {
			//Login Check
			if (isset($_SESSION['user']) /*&& isset($_SESSION['type']) && isset($_SESSION['crypted'])*/) {
				return true;
			}    
			return false;
		}

		public function time_left() {
			return $this->end_time - date('Y-m-d H:i:s');
		}
		
		public function isEventStarted() {
			return (strtotime(date('Y-m-d H:i:s')) > strtotime($this->start_time))?1:0;
		}
		
		public function isEventEnded() {
			return (strtotime(date('Y-m-d H:i:s')) > strtotime($this->end_time))?1:0;
		}
	}
?>