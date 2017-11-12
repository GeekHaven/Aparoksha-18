<?php
    require(__DIR__."/constants.php");

    try {
	    $dbh = new PDO("mysql:dbname=$DB_name;host=$DB_server", "$DB_user", "$DB_password");
    } catch(PDOException $e) {
	    echo $e->getMessage();
    }
?>
