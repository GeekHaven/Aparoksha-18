<?php
error_reporting(0);
if(!mysql_connect("localhost","aparokshadba","@p@r0ksh@dba2015"))
{
	die('oops connection problem ! --> ');
}
if(!mysql_select_db("aparokshadb"))
{
	die('oops database problem ! --> ');
}

?>
