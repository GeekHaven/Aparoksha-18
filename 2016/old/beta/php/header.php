<?php
    require("constants.php");
	try {
	    $dbh = new PDO("mysql:dbname=$DB_db;host=$DB_host", "$DB_user", "$DB_password");
	} catch(PDOException $e) {
	    echo "Could not connect to server. Please try after some time.";
	    exit(0);
	}
?>
