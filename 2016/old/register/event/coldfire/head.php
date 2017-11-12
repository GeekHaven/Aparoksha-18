<?php
    //Header file required
    //Relative path as per your directory
    require_once("../includes/includes_eve.php");
    
    //Starting and ending time of events
    $start_time = '2015-03-17 14:40:03.000000';
    $end_time = '2015-03-20 18:40:03.000000';
    $DIR = "questions/";
    $islogin = 0;
    $isvalid = 0;
    //Login Check
    $login = new Login('15', $start_time, $end_time, $dbh);
    
    
    
     
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
    $qID = array('1', '2', '3', '4', '5', '6', '7', '8', '9','10');
    $level = new Level('15', $start_time, $dbh, $qID);

    $ranks = new RANK('15', $start_time, $dbh);
    ?>

    