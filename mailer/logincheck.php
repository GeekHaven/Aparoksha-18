<?php 

    session_start();

    if(isset($_POST['submit1'])){
        define('MyConst', TRUE);
    }

    if(!defined('MyConst')){
        echo '<script language="javascript">';
        echo 'alert("Access Denied")';
        echo '</script>';   
        header("Refresh: 1; url=index.php");
    }

    else{

        if(isset($_POST['username']) && isset($_POST['password'])){
        	$pass = htmlentities($_POST['password']);
        	$user = htmlentities($_POST['username']);
        }

        //Load composer's autoloader
        require '../register/vendor/autoload.php';

        $dotenv = new Dotenv\Dotenv(__DIR__);
        if (file_exists('.env')) {
            $dotenv->load('.env');
        }
            
        $servername = getenv('DB_HOST');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');
        $dbname = getenv('DB_NAME');
        $tbname = getenv('TB1_NAME');

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	$stmt = $conn->prepare('SELECT * FROM admin WHERE username = :username AND password = :password');
    		$stmt->execute(['username' => $user, 'password' => $pass]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

    		if($user == Null){
    			echo '<script language="javascript">';
    	      	echo 'alert("Invalid credentials! Try Again")';
    	      	echo '</script>';   
    	      	header("Refresh: 1; url=index.php"); 
    		}


    		else{		    
                $id = $user['id'];
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $id;
                $_SESSION['isactive'] = true;
    	      	header("location: send.php"); 
    	    }

        }
    	
    	catch(PDOException $e){
        		echo '<script language="javascript">';
          		echo '$sql . "<br>" . $e->getMessage();';
                echo '</script>';     
          		header("Refresh: 1; url=index.php");
        	}

        $conn = null;
    }

?>