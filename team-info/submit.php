<?php 

    session_start();
    require '../register/vendor/autoload.php';

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

        if(isset($_POST['handle']) && isset($_POST['info']) && isset($_POST['dept'])){
        	$handle = htmlentities($_POST['handle']);
            $position = htmlentities($_POST['position']);
            $dept = htmlentities($_POST['dept']);
            $info = htmlentities($_POST['info']);
            $fb = htmlentities($_POST['facebook']);
            $github = htmlentities($_POST['github']);
            $twitter = htmlentities($_POST['twitter']);
        }

        $dotenv = new Dotenv\Dotenv(__DIR__);
        if (file_exists('.env')) {
            $dotenv->load('.env');
        }
            
        $servername = getenv('DB_HOST');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');
        $dbname = getenv('DB_NAME');
        $tbname = getenv('TB_NAME');

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	$stmt = $conn->prepare("INSERT INTO $tbname (handle,position,dept,info,facebook,github,twitter) VALUES (:handle,:position,:dept,:info,:facebook,
            :github,:twitter)");
            $do = $stmt->execute(['handle' => $handle, 'position' => $position, 'dept' => $dept, 'info' => $info, 'facebook' => $fb, 'github' => $github, 'twitter' => $twitter]);
            
            if($do){
                $_SESSION['confirm'] = "Details saved successfully."; 
                header("Refresh: 0; url=index.php#info");
                exit;
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