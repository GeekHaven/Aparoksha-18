
<?php
session_start();

    $clicked = false;

    if(isset($_POST['sub1'])){
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
        if(isset($_POST['uemail']) && isset($_POST['mobile'])){
            $email = htmlentities($_POST['uemail']);
            $mobile = htmlentities($_POST['mobile']);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Fill all values. Try Again!")';
            echo '</script>';   
            header("Refresh: 1; url=check.php");
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "apk";
        $tbname = "users";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email AND mobile = :mobile');
            $stmt->execute(['email' => $email, 'mobile' => $mobile]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == Null){
                $_SESSION['confirm'] = "No records found!  Please try again with correct credentials.  ";
                // echo '<script language="javascript">';
                // echo 'alert("")';
                // echo '</script>';   
                header("Refresh: 0; url=check.php"); 
            }

            else{
                    $_SESSION['confirm'] = "Your details are shown.";
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['mobile'] = $user['mobile'];
                    $_SESSION['verify'] = $user['status'];
                    header("Refresh: 0; url=check.php");
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