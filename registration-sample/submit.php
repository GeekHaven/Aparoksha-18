
<?php
session_start();
include("php-mailer.php");

    $clicked = false;

    if(isset($_POST['sub'])){
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
        if(isset($_POST['uemail']) && isset($_POST['uname']) && isset($_POST['mobile'])){
            $name = htmlentities($_POST['uname']);
            $email = htmlentities($_POST['uemail']);
            $mobile = htmlentities($_POST['mobile']);
            $hash = md5( rand(0,1000) );
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Fill all values. Try Again!")';
            echo '</script>';   
            header("Refresh: 1; url=index.php");
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

            if($user != Null){
                $_SESSION['confirm'] = "This email is already registered. If you want to check your registration status
                                        click on link below or contact  ";
                // echo '<script language="javascript">';
                // echo 'alert("")';
                // echo '</script>';   
                header("Refresh: 0; url=index.php"); 
            }

            else{
                if(mailsend($email,$hash)){

                    $sql = $conn->prepare("INSERT INTO $tbname (name,email,mobile,activate) VALUES (:name,:email,:mobile,:hash)");
                    $do = $sql->execute(['name' => $name, 'email' => $email,'mobile' => $mobile, 'hash' => $hash]);

                    if($do){
                        $_SESSION['confirm'] = "You have been registered successfully. Please verify your email 
                                                by clicking the confirmation link sent to your email.";
                        // echo '<script language="javascript">';
                        // echo 'alert("")';
                        // echo '</script>';   
                        header("Refresh: 0; url=index.php"); 
                    }
                  
                    else{
                        $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
                                                try again after some time. If problem persists then drop a mail to ";
                        // echo '<script language="javascript">';
                        // echo 'alert("")';
                        // echo '</script>';   
                        header("Refresh: 0; url=index.php"); 
                    }
                } 
            }
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
            try again after some time. If problem persists then drop a mail to ";
            // echo '<script language="javascript">';
            // echo 'alert("")';
            // echo '</script>';   
            header("Refresh: 0; url=index.php");
        }
        $clicked = false;
        $conn = null;
    }

?>