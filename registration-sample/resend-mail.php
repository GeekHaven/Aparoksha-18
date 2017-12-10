<?php
    session_start();
    include("php-mailer.php");

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
            header("Refresh: 1; url=resend.php");
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "apk";
        $tbname = "users";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == Null){
                $_SESSION['confirm'] = "No records found!  Please try again with correct credentials.  ";
                // echo '<script language="javascript">';
                // echo 'alert("")';
                // echo '</script>';   
                header("Refresh: 0; url=resend.php"); 
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
                else{
                    if(mailsend($email,$hash)){
                        $sql = $conn->prepare("UPDATE $tbname SET activate = :hash WHERE email = :email");
                        $do = $sql->execute(['email' => $email,'hash' => $hash]);
                        $_SESSION['confirm'] = "Confirmation code has been resent. Please check your mail.";                
                        header("Refresh: 0; url=resend.php");
                    }
                    else{
                        $_SESSION['confirm'] = "Some error! Please try again. Or contact";
                        header("Refresh: 0; url=resend.php"); 
                    }
                }                
            } 
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with resending mail to you. Please
            try again after some time. If problem persists then drop a mail to ";
            // echo '<script language="javascript">';
            // echo 'alert("")';
            // echo '</script>';   
            header("Refresh: 0; url=resend.php");
        }
        $clicked = false;
        $conn = null;
    }

?>
