<?php
    //Header file required
    //Relative path as per your directory
    require_once("../includes/includes_eve.php");
    
    //Starting and ending time of events
    $start_time = '2015-10-16 00:01:30';
    $end_time = '2015-10-16 23:50:00';
    $DIR = "questions/";
    $islogin = 0;
    $isvalid = 0;
    //Login Check
    $login = new Login('1', $start_time, $end_time, $dbh);
    
    
    
     
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
    $qID = array('1', '2', '3', '4', '5' ,'6' ,'7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22','23', '24','25', '26', '27', '28','29','30','31','32','33');
    $level = new Level('1', $start_time, $dbh, $qID);

    $ranks = new RANK('1', $start_time, $dbh);
    ?>

    