
<?php
session_start();

require '../../register/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
       $dotenv->load('.env');
    }

    date_default_timezone_set('Asia/Kolkata');

    $dbhost = getenv('DB_HOST');
    $dbuser = getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbn = getenv('DB_NAME');
    $tbn = getenv('TB_NAME');
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
        //ToDo Client Side handling of empty data
        if(isset($_POST['uemail']) && isset($_POST['uname']) && isset($_POST['mobile']) && isset($_POST['course']) && isset($_POST['semester']) && isset($_POST['collegename'])){
            $name = htmlentities($_POST['uname']);
            $_SESSION['name'] = $name;
            $email = htmlentities($_POST['uemail']);
            $_SESSION['email'] = $email;
            $mobile = htmlentities($_POST['mobile']);
            $_SESSION['mobile'] = $mobile;
            $course = htmlentities($_POST['course']);
            $_SESSION['course'] = $course;
            $semester = htmlentities($_POST['semester']);
            $_SESSION['semester'] = $semester;
            $collegename = htmlentities($_POST['collegename']);
            $_SESSION['collegename'] = $collegename;
            $yourinfo = htmlentities($_POST['yourinfo']);
            $_SESSION['yourinfo'] = $yourinfo;

            if(isset($_POST['frontend'])){$_SESSION['frontend'] = true;}
            if(isset($_POST['backend'])){$_SESSION['backend'] = true;}  
            if(isset($_POST['fullstack'])){$_SESSION['fullstack'] = true;}
            if(isset($_POST['graphics'])){$_SESSION['graphics'] = true;}
            if(isset($_POST['content'])){$_SESSION['content'] = true;} 
            if(isset($_POST['business'])){$_SESSION['business'] = true;}  
            if(isset($_POST['marketing'])){$_SESSION['marketing'] = true;}
            if(isset($_POST['datascience'])){$_SESSION['datascience'] = true;}


            if(!isset($_POST['profiles']) || sizeof($_POST['profiles'])<1 ) {    
                $_SESSION['confirm'] = "Please select at least one interested profile";
                header("Refresh: 0; url=index.php#info");
                exit;
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
            $date_clicked = date('Y-m-d H:i:s');
    
            $sql = $conn->prepare("INSERT INTO $tbname (dated,name,email,mobile,course,semester,collegename,yourinfo,frontend,backend,
                    fullstack,graphic,content,business,marketing,datascience) VALUES (:dated,:name,:email,:mobile,:course,:semester,:collegename,
                    :yourinfo,:frontend,:backend,:fullstack,:graphic,:content,:business,:marketing,:datascience)");
            $do = $sql->execute(['dated' => $date_clicked, 'name' => $name, 'email' => $email,'mobile' => $mobile,'course' => $course, 'semester' => $semester,'collegename' => $collegename,
                 'yourinfo' => $yourinfo, 'frontend' => isset($_POST['frontend'], 'backend' => isset($_POST['backend'], 'fullstack' => isset($_POST['fullstack'],
                 'graphic' => isset($_POST['graphic'], 'content' => isset($_POST['content'], 'business' => isset($_POST['business'], 'marketing' => isset($_POST['marketing'], 'datascience' => isset($_POST['datascience']]);

            if($do){
                $_SESSION['confirm'] = "You have been registered successfully."; 
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['mobile']);
                unset($_SESSION['course']);
                unset($_SESSION['collegename']);
                unset($_SESSION['yourinfo']);
                unset($_SESSION['frontend']);
                unset($_SESSION['backend']);
                unset($_SESSION['business']);
                unset($_SESSION['content']);
                unset($_SESSION['fullstack']);
                unset($_SESSION['graphics']);
                unset($_SESSION['marketing']);
                unset($_SESSION['datascience']);
                header("Refresh: 0; url=index.php#info");
                exit;
            }
              
            else{
                $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
                                        try again after some time. If problem persists please feel free to contact any person mentioned below ";
                header("Refresh: 0; url=index.php#info"); 
                exit;
            }

        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with registering you. Please
            try again after some time. If problem persists please feel free to contact any person mentioned below ";
            header("Refresh: 0; url=index.php#info");
            exit;
        }
        $clicked = false;
        $conn = null;
    }

?>
