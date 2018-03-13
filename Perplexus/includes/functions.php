<?php

require '/var/www/html/Perplexus/vendor/autoload.php';


class Users {
	public $table_name = 'users';
	public static $conn;
	function __construct(){

		$dotenv = new Dotenv\Dotenv(__DIR__);

		if (file_exists('/var/www/html/Perplexus/includes/.env')) {
			$dotenv->load('.env');
		}
		
		
		$dbhost = getenv('DB_HOST');
		$dbuser = getenv('DB_USER');
		$dbpass = getenv('DB_PASS');
		$dbn = getenv('DB_NAME');
		
		//database configuration
		$dbServer = $dbhost; //Define database server host
		$dbUsername = $dbuser; //Define database username
		$dbPassword = $dbpass; //Define database password
		$dbName = $dbn; //Define database name

		$conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$picture){
		//database configuration
		$dbServer = $dbhost; //Define database server host
		$dbUsername = $dbuser; //Define database username
		$dbPassword = $dbpass; //Define database password
		$dbName = $dbn; //Define database name
		$table_name = 'users';
		
		$conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("SELECT * FROM $table_name WHERE oauth_provider = :oauth_provider AND oauth_uid = :oauth_uid");
		$stmt->execute(['oauth_provider' => $oauth_provider, 'oauth_uid' => $oauth_uid]);
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($user != null){
			$stmt1 = $conn->prepare("UPDATE $table_name SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'");
			$stmt1->execute();
		}
		else{
			$stmt1 = $conn->prepare("INSERT INTO $table_name SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'");
			$stmt1->execute();
		}

		$stmt2 = $conn->prepare("SELECT * FROM $table_name WHERE oauth_provider = :oauth_provider AND oauth_uid = :oauth_uid");
		$stmt2->execute(['oauth_provider' => $oauth_provider, 'oauth_uid' => $oauth_uid]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
}
?>