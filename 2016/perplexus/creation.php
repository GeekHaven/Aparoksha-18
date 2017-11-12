<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
error_reporting(E_ALL ^ E_DEPRECATED);
$conn = mysql_connect($dbhost,$dbuser,$dbpassword);
//if(!conn)
//{
	//die('Error while connecting to db'.mysql_error());
//}
echo 'Connection succesful';
$sql1 = 'create database users';
$sql2 = 'create table users('.'user_id int not null auto_increment,'.'user_fname varchar(25) not null, '.'user_lname varchar(25) not null, '.'user_email varchar(25) not null, '.'user_pass varchar(255) not null,'.'primary key(user_id) ) ';
$sql3 = 'alter table users add column score int default 0';
$sql4='alter table users add column time timestamp default current_timestamp on update current_timestamp';
$retval1 = mysql_query($sql1,$conn);
mysql_select_db('users');
$retval2 = mysql_query($sql2,$conn);
$retval3 = mysql_query($sql3,$conn);
$retval4=mysql_query($sql4,$conn);
if(!$retval2)
{
	die("Error creating database".mysql_error());
	


}
if(!$retval3)
{
	die("Error creating database".mysql_error());
	


}
echo ' database created succesfully\n';
mysql_close($conn);

?>
