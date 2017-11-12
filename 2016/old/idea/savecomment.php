<?php

session_start();

include("db.php");

$comment=$_POST['comment'];
$fk_id=$_POST['postid'];
$user = $_POST['user'];
if(isset($_SESSION['name'])&&!empty($_SESSION['name'])){

mysql_query("INSERT INTO comments(comment,post_id_fk, username) VALUES ('$comment','$fk_id', '$user')");

header('Location: index.php?action=view');}
else{
	echo "You are not logged in!!!";
	}
?>
