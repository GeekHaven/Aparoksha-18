<?php

session_start(); 

include("db.php");
$msql=mysql_query("SELECT * FROM posts ORDER BY post_id DESC");
while($post_count=mysql_fetch_array($msql))
{
$id=$post_count['post_id'];
$idea=$post_count['post'];
$title=$post_count['title'];
?>