<?php
   session_start();
   if(!isset($_SESSION['isactive'])){  
	  	echo '<script language="javascript">';
      	echo 'alert("What? Dude login first :P")';
      	echo '</script>';   
       	header("Refresh: 1; url=index.php"); 
      	exit();
	}
	else{
	   session_unset();
	   session_destroy();
	   header("location: index.php");
	}
?>