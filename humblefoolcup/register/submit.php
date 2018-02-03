
<?php
session_start();
include("php-mailer.php");

require '../../register/vendor/autoload.php';

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
    $dev = getenv('DEVELOPMENT');

    $clicked = false;

    if(isset($_POST['sub'])){
        $clicked = true;
        $date_clicked = date('Y-m-d H:i:s');
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
        if(isset($_POST['uname']) && isset($_POST['mobile']) && isset($_POST['uemail']) && isset($_POST['college'])
            && isset($_POST['tid'])) {

            $name = htmlentities($_POST['uname']);
            $email = htmlentities($_POST['uemail']);
            $mobile = htmlentities($_POST['mobile']);
            $college = htmlentities($_POST['college']);
            if(isset($_POST['collegeid'])){
                $collegeid = htmlentities($_POST['collegeid']);
            }
            $topcoderid = htmlentities($_POST['tid']);
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

            $stmt = $conn->prepare("SELECT * FROM $tbname WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user != Null){
                $_SESSION['confirm'] = "This email is already registered. If you want any help please contact any person mentioned below.";
                header("Refresh: 0; url=index.php#info"); 
                exit;
            }

            else{
                //If in development environment then do not send mail
                if(($dev !== "true") && mailsend($email,$topcoderid, $name)){
                 $sql = $conn->prepare("INSERT INTO $tbname (dated,name,email,mobile,college_name,college_id,topcoder_id,mailed) VALUES (:dated,:name,:email,:mobile,:college_name,:college_id,:topcoder_id,:mailed)");
                    $do = $sql->execute(['dated' => $date_clicked ,'name' => $name, 'email' => $email, 'mobile' => $mobile, 'college_name' => $college,'college_id' => $collegeid, 'topcoder_id' => $topcoderid, 'mailed' => 'true' ]);

                    if($do){
                        $_SESSION['confirm'] = "You have been registered successfully. We have sent you a mail containing detailed instructions for
                        using topcoder for HumblefoolCup. Best wishes."; 
                        header("Refresh: 0; url=index.php#info");
                        exit;
                    }
                  
                    else{
                        $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
                                                try again after some time. If problem persists please feel free to contact website administrator";
                        header("Refresh: 0; url=index.php#info"); 
                        exit;
                    }
                }
                if($dev === "true") {
                    $sql = $conn->prepare("INSERT INTO $tbname (dated,name,email,mobile,college_name,college_id,topcoder_id,mailed) VALUES (:dated,:name,:email,:mobile,:college_name,:college_id,:topcoder_id,:mailed)");
                    $do = $sql->execute(['dated' => $date_clicked ,'name' => $name, 'email' => $email, 'mobile' => $mobile, 'college_name' => $college,'college_id' => $collegeid, 'topcoder_id' => $topcoderid, 'mailed' => 'false' ]);


                    if($do){
                        $_SESSION['confirm'] = "You have been registered successfully. We have some trouble sending you mail. Feel free to contact person
                        mentioned below if you don't recieve mail in few days."; 
                        header("Refresh: 0; url=index.php#info"); 
                        exit;
                    }
                  
                    else{
                        $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
                                                try again after some time. If problem persists please feel free to contact website administrator ";
                        header("Refresh: 0; url=index.php#info");
                        exit;
                    }
                }
                else {
                    $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
                                        try again after some time. If problem persists please feel free to contact website administrator";
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
