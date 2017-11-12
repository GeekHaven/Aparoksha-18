<?php

session_start(); 

include("db.php");
$id=$_POST['id'];

if(!isset($_SESSION['name']) || empty($_SESSION['name']))
	echo 'you are not logged in!!!! You cannot access this page!!!';
elseif($_SESSION['admin_name'] != 1)
	echo 'You cannot access this page!!!';
else {
if(isset($_POST['active']))
mysql_query("UPDATE posts SET isactive=1 WHERE post_id='$id'");
elseif(isset($_POST['delete']))
mysql_query("UPDATE posts SET isdelete=1 WHERE post_id='$id'");

}
header('Location: admin.php');
?>