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
        	$pass = md5(htmlentities($_POST['password']));
        	$user = htmlentities($_POST['username']);
        }

        //Load composer's autoloader
        require '../../register/vendor/autoload.php';

        $dotenv = new Dotenv\Dotenv(__DIR__);
        if (file_exists('.env')) {
            $dotenv->load('.env');
        }
            
        $valid_user = getenv('USER_NAME');
        $valid_pass = getenv('PASSWORD');

        try {
            
            if($user === $valid_user && $pass === $valid_pass)
            {
                $_SESSION['isactive'] = true;
                header("location: verify.php");
                exit;
            }

            else 
            {
                $_SESSION['confirm'] = "Invalid credentials";
                header("Refresh: 1; url=index.php#info");
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