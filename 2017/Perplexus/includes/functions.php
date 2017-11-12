<?php
class Users {
	public $table_name = 'users';
	public static $con;
	function __construct(){
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'gymkhanadba'; //Define database username
		$dbPassword = 'gympass123'; //Define database password
		$dbName = 'gymkhana'; //Define database name
		
		//connect databse
		
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$picture){
		
		$prev_query = mysqli_query($this->connect,"SELECT * FROM ".$this->table_name." WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysql_error($this->connect));
		if(mysqli_num_rows($prev_query)>0){
			$update = mysqli_query($this->connect,"UPDATE $this->table_name SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
		}else{
			$insert = mysqli_query($this->connect,"INSERT INTO $this->table_name SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'");
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM $this->table_name WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>