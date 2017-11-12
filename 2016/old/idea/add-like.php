<?php

session_start();      
	
	include 'includes/config.php';
    
	extract($_POST);
		
		$user=$_SESSION['name'];
		$dislike_sql = mysql_query('SELECT COUNT(*) FROM  likes WHERE username = "'.$user.'" and post_id = "'.$postID.'" and rate = 2 ');
		$dislike_count = mysql_result($dislike_sql, 0); 
		
		$like_sql = mysql_query('SELECT COUNT(*) FROM  likes WHERE username = "'.$user.'" and post_id = "'.$postID.'" and rate = 1 ');
		$like_count = mysql_result($like_sql, 0); 

	if($act == 'like'):
		if(($like_count == 0) && ($dislike_count == 0)){
			mysql_query('INSERT INTO likes (post_id, username, rate )VALUES("'.$postID.'", "'.$user.'", "1")');
		}
		if($dislike_count == 1){
			mysql_query('UPDATE likes SET rate = 1 WHERE post_id = '.$postID.' and username ="'.$user.'"');
		}

	endif;
	if($act == 'dislike'): 
		if(($like_count == 0) && ($dislike_count == 0)){
			mysql_query('INSERT INTO likes (post_id, username, rate )VALUES("'.$postID.'", "'.$user.'", "2")');
		}
		if($like_count == 1){
			mysql_query('UPDATE likes SET rate = 2 WHERE post_id = '.$postID.' and username ="'.$user.'"');
		}

	endif;
	
	 	$rate_like_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'" and rate = 1');
    	$rate_like_count = mysql_result($rate_like_count, 0); 
    	
    	if($rate_like_count>1){
    		$lyk= " Likes";
    	}
    	else{
    		$lyk= " Like";
    	}
    	
    	echo $rate_like_count.$lyk;
	
?>