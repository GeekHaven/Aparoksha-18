<?php
    session_start();
    include("php-mailer.php");

    require '../vendor/autoload.php';
    
    $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
       $dotenv->load('.env');
    }
    
    $dbhost = getenv('DB_HOST');
    $dbuser = getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbn = getenv('DB_NAME');
    $tbn = getenv('TB_NAME');
    $dev = getenv('DEVELOPMENT');

    $clicked = false;

    if(isset($_POST['sub3'])){
        $clicked = true;
    }

    if(!$clicked){
        echo '<script language="javascript">';
        echo 'alert("Access Denied")';
        echo '</script>';   
        header("Refresh: 1; url=index.php");
    }

    else{
        //ToDo Client Side handling of empty data
        if(isset($_POST['uemail'])){
            $email = htmlentities($_POST['uemail']);
            $hash = md5( rand(0,1000) );
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Fill all values. Try Again!")';
            echo '</script>';   
            header("Refresh: 1; url=resend.php#info");
        }

        $servername = $dbhost;
        $username = $dbuser;
        $password = $dbpass;
        $dbname = $dbn;
        $tbname = $tbn;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == Null){
                $_SESSION['confirm'] = "No records found!  Please try again with correct credentials.  ";
                header("Refresh: 0; url=resend.php#info"); 
            }

            else{
                if($user['status'] == 'approved'){
                    $_SESSION['confirm'] = "Your account is already activated. Details are given below.";
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['college'] = $user['college'];
                    $_SESSION['events'] = $user['events'];
                    $_SESSION['verify'] = $user['status']; 
                    header("Refresh: 0; url=check.php#info");
                    exit;
                }
                else{
                    //Disable mail sending if environment is development
                    if(($dev !== "true") && mailsend($email,$hash, $user['name'])){
                        $sql = $conn->prepare("UPDATE $tbname SET activate = :hash WHERE email = :email");
                        $do = $sql->execute(['email' => $email,'hash' => $hash]);
                        $_SESSION['confirm'] = "Confirmation code has been resent. Please check your mail.";                
                        header("Refresh: 0; url=resend.php#info");
                        exit;
                    }
                    if($dev === "true") {
                        $sql = $conn->prepare("UPDATE $tbname SET activate = :hash WHERE email = :email");
                        $do = $sql->execute(['email' => $email,'hash' => $hash]);
                        $_SESSION['confirm'] = "Confirmation code has been resent. Please check your mail.";                
                        header("Refresh: 0; url=resend.php#info");
                        exit;
                    }
                    else{
                        $_SESSION['confirm'] = "Some error! Please try again. Or contact";
                        header("Refresh: 0; url=resend.php#info"); 
                    }
                }                
            } 
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with resending mail to you. Please
            try again after some time. If problem persists then drop a mail to ";
            header("Refresh: 0; url=resend.php#info");
        }
        $clicked = false;
        $conn = null;
    }

?>
