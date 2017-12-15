<?php
    session_start();
    require 'vendor/autoload.php';
    
    $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
        $dotenv->load('.env');
    }
    
    $dbhost = getenv('DB_HOST');
    $dbuser = getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbn = getenv('DB_NAME');
    $tbn = getenv("TB_NAME");

    $servername = $dbhost;
    $username = $dbuser;
    $password = $dbpass;
    $dbname = $dbn;
    $tbname = $tbn;

    if (isset($_GET["activate"]) && isset($_GET["email"])) {
        $code = $_GET["activate"];
        $email = $_GET['email'];
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
        if($user == Null){
            $_SESSION['confirm'] = "No records found! Please try again with correct link or <a href='resend.php'>click here</a>
                                    to resend email. "; 
            header("Refresh: 0; url=check.php"); 
        }
        else{
            if($user['status'] == 'approved'){
                $_SESSION['confirm'] = "Your account is already activated. Details are given below.";
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['mobile'] = $user['mobile'];
                $_SESSION['verify'] = $user['status']; 
                header("Refresh: 0; url=check.php");
            }
            if($user['activate'] == $code){
                $sql = $conn->prepare("UPDATE $tbname SET status = 'approved' WHERE email = :email");
                $do = $sql->execute(['email' => $email]);
                if($do){
                    $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
                    $stmt->execute(['email' => $email]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['confirm'] = "Your account has been successfully activated. Details are given below.";
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['mobile'] = $user['mobile'];
                    $_SESSION['verify'] = $user['status']; 
                    //var_dump($_SESSION['verify']);
                    header("Refresh: 0; url=check.php");
                }
                else{
                    $_SESSION['confirm'] = "Oops! we ran into some error. Try again or contact website administrator."; 
                    header("Refresh: 0; url=check.php"); 
                }
            }
            else{
                $_SESSION['confirm'] = "Activation link incorrect or <a href='resend.php'>click here</a>
                                        to resend email or contact "; 
                header("Refresh: 0; url=check.php"); 
            }
        }
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
    }
    
?>