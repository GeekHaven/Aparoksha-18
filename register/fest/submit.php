
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
        //ToDo Client Side handling of empty data
        if(isset($_POST['uemail']) && isset($_POST['uname']) && isset($_POST['mobile'])){
            $name = htmlentities($_POST['uname']);
            $email = htmlentities($_POST['uemail']);
            $mobile = htmlentities($_POST['mobile']);
            $hash = md5( rand(0,1000) );
            if(!isset($_POST['event']) || sizeof($_POST['event'])<2 ) {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['mobile'] = $mobile;
                $_SESSION['confirm'] = "Please select at least two events";
                header("Refresh: 0; url=index.php#info");
                exit;
            }
            else {
                $events = $_POST['event'];
                $event = "";
                for($count = 0; $count < sizeof($events); $count++) {
                    $event = $event.$events[$count].", ";
                }
            }
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

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user != Null){
                $_SESSION['confirm'] = "This email is already registered. If you want to check your registration status
                                        click on link above to or contact any person given below";
                header("Refresh: 0; url=index.php#info"); 
                exit;
            }

            else{
                if(mailsend($email,$hash,$name)){

                    $sql = $conn->prepare("INSERT INTO $tbname (name,email,mobile,events,activate) VALUES (:name,:email,:mobile,:events,:hash)");
                    $do = $sql->execute(['name' => $name, 'email' => $email,'mobile' => $mobile, 'events' => $event, 'hash' => $hash]);

                    if($do){
                        $_SESSION['confirm'] = "You have been registered successfully. Please verify your email by clicking on the
                        link sent to your email"; 
                        header("Refresh: 0; url=index.php#info"); 
                        exit;
                    }
                  
                    else{
                        $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
                                                try again after some time. If problem persists please feel free to contact any person mentioned below ";
                        header("Refresh: 0; url=index.php#info"); 
                    }
                } 
            }
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
            try again after some time. If problem persists please feel free to contact any person mentioned below ";
            header("Refresh: 0; url=index.php#info");
        }
        $clicked = false;
        $conn = null;
    }

?>