<?php
/*include("db.php");

$like=$_POST['like_but'];
$id=$_POST['id'];

$like=$like+1;

mysql_query("UPDATE posts SET likes='$like' WHERE post_id='$id'");

//echo "this post now has ".$like." likes";
header('Location: index.php?action=view');*/

session_start();


include ("db.php");

$like=$_POST['like_but'];
$id=$_POST['id'];
$user=$_POST['user'];
//echo $_SERVER['HTTP_REFERER'];


$i=0;
       $q = mysql_query("SELECT * FROM likes WHERE post_id_fk='$id'");
        while($like_count=mysql_fetch_array($q)) { 
		$i=1;
        if($like_count["username"] == $user){
            if($like_count["liked"]=='1'){
                mysql_query("UPDATE likes SET liked='0' WHERE post_id_fk='$id' AND username='$user'"); //DELETES RATING
            	$like = $like - 1;
				mysql_query("UPDATE posts SET likes='$like' WHERE post_id='$id'");
				
            } else {
                mysql_query("UPDATE likes SET liked='1' WHERE post_id_fk='$id' AND username='$user'"); //CHANGES RATING
				$like = $like + 1;
				mysql_query("UPDATE posts SET likes='$like' WHERE post_id='$id'");
				
            }
        } else {
            mysql_query("INSERT INTO likes(username,post_id_fk,liked) VALUES('$user','$id','1')");
			$like = $like + 1;
			mysql_query("UPDATE posts SET likes='$like' WHERE post_id='$id'");
			
        } 
		//header('Location: index.php?action=read&id='.$id.'');
		}
		if($i==0){
			mysql_query("INSERT INTO likes(username,post_id_fk,liked) VALUES('$user','$id','1')");
			$like = $like + 1;
			mysql_query("UPDATE posts SET likes='$like' WHERE post_id='$id'");
		}
		$url=$_SERVER['HTTP_REFERER'];
		//echo "its working";
	header('Location: '.$url.'');

?>

