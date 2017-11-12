<?php
    //Header file required
    //Relative path as per your directory
    require_once("../includes/includes_eve.php");
    
    //Starting and ending time of events
    $start_time = '2015-10-17 07:00:00';
    $end_time = '2015-10-18 12:09:00';
    $DIR = "https://drive.google.com/file/d/";
    $islogin = 0;
    $isvalid = 0;
    //Login Check
    $login = new Login('3', $start_time, $end_time, $dbh);
    
    
    
     
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
    $qID = array('1', '2', '3', '4', '5' ,'6' ,'7', '8', '9', '10', '11', '12', '13', '14', '15');
    $level = new Level('3', $start_time, $dbh, $qID);

    $ranks = new RANK('3', $start_time, $dbh);
    ?>

    