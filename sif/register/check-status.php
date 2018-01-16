
<?php
session_start();

    require '../../register/vendor/autoload.php';

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

    if(isset($_POST['sub1'])){
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
        if(isset($_POST['uemail']) && isset($_POST['mobile'])){
            $email = htmlentities($_POST['uemail']);
            $mobile = htmlentities($_POST['mobile']);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Fill all values. Try Again!")';
            echo '</script>';   
            header("Refresh: 1; url=check.php");
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

            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email AND mobile = :mobile');
            $stmt->execute(['email' => $email, 'mobile' => $mobile]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == Null){
                $_SESSION['confirm'] = "No records found!  Please try again with correct credentials.  ";
                header("Refresh: 0; url=check.php#info"); 
                exit;
            }

            else{
                    $_SESSION['confirm'] = "Your details are shown.";
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['mobile'] = $user['mobile'];
                    $_SESSION['college'] = $user['college'];
                    $_SESSION['verify'] = $user['status'];
                    $_SESSION['events'] = $user['events'];
                    header("Refresh: 0; url=check.php#info");
                    exit;
            } 
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
            try again after some time. If problem persists then drop a mail to ";
            header("Refresh: 0; url=index.php#info");
            exit;
        }
        $clicked = false;
        $conn = null;
    }

?>