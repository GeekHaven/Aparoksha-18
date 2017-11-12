<?php 
 $mysql_host = "localhost";
 $mysql_database = "tech";
 $mysql_user = "tech";
 $mysql_password = "tech@123";

 $db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_select_db($mysql_database);
?>