<?php
    //Header file required
    //Relative path as per your directory
    require_once("../includes/includes_eve.php");
    
    //Starting and ending time of events
    $start_time = '2015-03-17 14:40:03.000000';
    $end_time = '2015-03-22 00:30:03.000000';
    $DIR = "questions/";
    $islogin = 0;
    $isvalid = 0;
    //Login Check
    $login = new Login('14', $start_time, $end_time, $dbh);
    
    
    
     
    //Time Check for ended
    /*if ($login->isEventEnded())
	echo "Event Ended";
    
   /// echo '<br><br><br><br><br>';
    
    //Time Check for start
    if ($login->isEventStarted() && !$login->isEventEnded()){
		echo "Event Started";
	    
	    if($login->isLogin()) {
	        if($login->isParticipant()) {
	            echo "you are a valid participant";
	        } else {
	           echo "Not a participant";
	        }
	    } else {
	        echo "not login";
	    }
	}*/
   // echo '<br><br><br><br><br>';

    //Array of qid's in series of questions at each level
    $qID = array('q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13','q14', 'q15', 'q16', 'q17', 'q18', 'q19');
    $level = new Level('14', $start_time, $dbh, $qID);

    $ranks = new RANK('14', $start_time, $dbh);
    ?>

    