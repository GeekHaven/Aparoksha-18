
<?php
session_start();

require '../register/vendor/autoload.php';

date_default_timezone_set('Asia/Kolkata');

    $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
       $dotenv->load('.env');
    }

    $dbhost = getenv('DB_HOST');
    $dbuser = getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbn = getenv('DB_NAME');
    $tbn = getenv('TB_NAME');
    $dbn1 = getenv('DB_NAME1');
    $tbn1 = getenv('TB_NAME1');
    $dev = getenv('DEVELOPMENT');

    $clicked = false;

    if(isset($_POST['sub'])){
        $clicked = true;
    }

    if(!$clicked){
        echo '<script language="javascript">';
        echo 'alert("Access Denied")';
        echo '</script>';   
        header("Refresh: 1; url=index.php");
        exit;
    }

    else{
        if(isset($_POST['uname']) && isset($_POST['pass'])) {
            $uname = htmlentities($_POST['uname']);
            $pass = htmlentities($_POST['pass']);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Fill all values. Try Again!")';
            echo '</script>';   
            header("Refresh: 1; url=index.php");
            exit;
        }

        $servername = $dbhost;
        $username = $dbuser;
        $password = $dbpass;
        $dbname = $dbn;
        $tbname = $tbn;

        $dbname1 = $dbn1;
        $tbname1 = $tbn1;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $conn->prepare("SELECT * FROM $tbname WHERE handle = :uname");
            $stmt->execute(['uname' => $uname]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if($user == Null){
                $_SESSION['confirm'] = "Wrong credentials. Please make sure you are in Top 50 in the prelims
                                        Round of HumblefoolCup.  Please follow instructions above. Try again, and if problem persists contact person mentioned below.";
                header("Refresh: 0; url=index.php#info"); 
                exit;
            }
    
            else{
                //If in development environment then do not send mail

                $fname = $user['first_name'];
                $fname = strtolower($fname);
                $upass = $fname.'_'.$uname;

                if($pass === $upass)
                {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname1", $username, $password);
            
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                    $stmt = $conn->prepare("SELECT * FROM $tbname1 WHERE topcoder_handle = :uname");
                    $stmt->execute(['uname' => $uname]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
                    if($user == Null){
                        $_SESSION['done'] = false;
                    }
                    else {
                        $_SESSION['done'] = true;
                    }
                    $_SESSION['username'] = $uname;
                    header("Refresh: 0; url=register/index.php");
                    exit;
                }

                else {
                    $_SESSION['confirm'] = "Wrong credentials. Please make sure you are in Top 50 in the prelims
                    Round of HumblefoolCup. Please follow instructions above. If problem persists please feel free to contact website administrator";
                    header("Refresh: 0; url=index.php#info");
                    exit;
                }
            }
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
            try again after some time. If problem persists please feel free to contact website administrator ";
            header("Refresh: 0; url=index.php#info");
            exit;
        }
        $clicked = false;
        $conn = null;
    }
?>
