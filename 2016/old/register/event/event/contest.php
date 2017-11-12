<?php
    //Header file required
    //Relative path as per your directory
    require_once("../includes/includes_eve.php");
    
    //Starting and ending time of events
    $start_time = '2015-01-24 14:40:03.000000';
    $end_time = '2015-01-25 14:40:03.000000';

    
    //Login Check
    $login = new Login('EVENT', $start_time, $end_time, $dbh);
    
    
    //Time Check for start
    if ($login->isEventStarted())
	echo "Event Started";
        
    //Time Check for ended
    if ($login->isEventEnded())
	echo "Event Ended";
    
    echo '<br><br><br><br><br>';
    
    
    
    if($login->isLogin()) {
        if($login->isParticipant()) {
            echo "you are a valid participant";
        } else {
           echo "Not a participant";
        }
    } else {
        echo "not login";
    }
    echo '<br><br><br><br><br>';



    //Array of qid's in series of questions at each level
    $qID = array('q1', 'q2', 'q3');
    $level = new Level('EVENT', $start_time, $dbh, $qID);
    
    echo $level->getLevel();
    echo '<br><br><br><br><br>';


    
    //Associative array of que details $arr['key']
    $arr = $level->getQueDetails();
    if(!$arr == null)
        print_r($arr);

    echo '<br><br><br><br><br>';

    
    
    // 1 = correct submission
    // -1 = incorrect ans
    // -2 = correct ans but not submitted(error)
    echo $level->submit('2');
    echo '<br><br><br><br><br>';
    
    //Updated level, So no need to refresh page
    echo $level->getLevel();
    echo '<br><br><br><br><br>';
    




    
    //Rank List
    $rank = new RANK('EVENT', $start_time, $dbh);
    
    print_r($rank->getRankList());
    echo '<br><br><br><br><br>';
    
    //-1 = No Submission/No rank
    echo $rank->getMyRank();
    echo '<br><br><br><br><br>';
?>