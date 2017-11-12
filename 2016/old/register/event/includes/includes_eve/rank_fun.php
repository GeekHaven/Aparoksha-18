<?php
    require_once(__DIR__."/enc_fun.php");
    require_once(__DIR__."/../seed/seed.php");
	
    class RANK extends ENC {
		protected $event = null;
		protected $seed = null;
		protected $uid = null;
		protected $dbh = null;
		protected $start_time = null;
		protected $rankList = null;
		protected $myRank = -1;
		
		public function __construct($e, $start_time, $d) {
		    if(isset($e)) {
			$this->event = constant($e);
			$s = $e . '';
			$this->seed = constant($s);
		    }
		    
		    if(isset($start_time)) $this->start_time = $start_time;
		    
		    if(isset($_SESSION['user'])) {
			$this->uid = $this->cleanString($_SESSION['user']);
			$this->uid = $this->encrypt($this->uid);
		    }
		    
		    if(isset($d)) $this->dbh = $d;
		    
		    $this->generateRankList();
		    $this->generateMyRank();
		}
		
		private function generateRankList() {
		    if($this->event == null || $this->seed == null || $this->uid == null || $this->dbh == null) return null;
		
		    $query = "SELECT @row_num := @row_num + 1 AS rank, tmp.username FROM ( SELECT `username`, count(*) AS NS, avg(TIMESTAMPDIFF(SECOND, :start_time, `time`)) AS AVG
			    FROM `" . $this->event . "_submissions` WHERE `valid` = 0 GROUP BY `username` ORDER BY NS DESC, AVG ASC) AS tmp, (SELECT @row_num := 0) r";
		    
		    $stmt = $this->dbh->prepare($query);
		    $stmt->bindParam(':start_time', $this->start_time, PDO::PARAM_STR);
		    $stmt->execute();
		    
		    $out = array();
		    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$out[$row['rank']] = $this->decrypt($row['username']);
		    }
		    
		    $this->rankList = $out;
		}
		
		private function generateMyRank() {
		    if($this->event == null || $this->seed == null || $this->uid == null || $this->dbh == null) return null;
		
		    $query = "SELECT * FROM ( SELECT @row_num := @row_num + 1 AS rank, tmp.username FROM ( SELECT `username`, count(*) AS NS, avg(TIMESTAMPDIFF(SECOND, :start_time, `time`)) AS AVG
			    FROM `" . $this->event . "_submissions` WHERE `valid` = 0 GROUP BY `username` ORDER BY NS DESC, AVG ASC) AS tmp, (SELECT @row_num := 0) r ) AS t WHERE t.username = :uid";
		    
		    $stmt = $this->dbh->prepare($query);
		    $stmt->bindParam(':start_time', $this->start_time, PDO::PARAM_STR);
		    $stmt->bindParam(':uid', $this->uid, PDO::PARAM_STR);
		    $stmt->execute();
		    
		    if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$this->myRank = $row['rank'];
			return;
		    }
		    
		    $this->myRank = -1;
		}
		
		public function getRankList() {
		    return $this->rankList;
		}
		
		public function getMyRank() {
		    return $this->myRank;
		}

		public function getInstitute($user){
			$query = "SELECT * FROM `colleges` WHERE id = (SELECT `college_id` FROM `user_details` WHERE user_id = (SELECT `id` FROM `users` WHERE username = :uid))";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(':uid', $user, PDO::PARAM_STR);
			$stmt->execute();
				
			
			if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
				$instt = $row['name'];
				return $instt;
			
			}
		}
    }

?>