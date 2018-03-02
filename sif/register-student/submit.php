
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
        if(isset($_POST['uemail']) && isset($_POST['uname']) && isset($_POST['mobile']) && isset($_POST['course']) && isset($_POST['semester']) && isset($_POST['collegename']) && isset($_POST['resumelink'])){
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
            $resumelink = htmlentities($_POST['resumelink']);
            $_SESSION['resumelink'] = $resumelink;

            $frontend = isset($_POST['frontend']) ? 1 : 0;
            if(isset($_POST['frontend'])){$_SESSION['frontend'] = $frontend;}
            $backend = isset($_POST['backend']) ? 1 : 0;
            if(isset($_POST['backend'])){$_SESSION['backend'] = $backend;}                
            $fullstack = isset($_POST['fullstack']) ? 1 : 0;
            if(isset($_POST['fullstack'])){$_SESSION['fullstack'] = $fullstack;}
            $graphics = isset($_POST['graphics']) ? 1 : 0;
            if(isset($_POST['graphics'])){$_SESSION['graphics'] = $graphics;} 
            $content = isset($_POST['content']) ? 1 : 0;
            if(isset($_POST['content'])){$_SESSION['content'] = $content;}            
            $business = isset($_POST['business']) ? 1 : 0;
            if(isset($_POST['business'])){$_SESSION['business'] = $business;}
            $marketing = isset($_POST['marketing']) ? 1 : 0;  
            if(isset($_POST['marketing'])){$_SESSION['marketing'] = $marketing;}
            $datascience = isset($_POST['datascience']) ? 1 : 0;  
            if(isset($_POST['datascience'])){$_SESSION['datascience'] = $datascience;}


            if($frontend==0 && $backend==0 && $fullstack==0 && $graphics==0 && $content==0 && $business==0 && $marketing==0 && $datascience==0) {    
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
                    fullstack,graphics,content,business,marketing,datascience,resumelink) VALUES (:dated,:name,:email,:mobile,:course,:semester,:collegename,
                    :yourinfo,:frontend,:backend,:fullstack,:graphics,:content,:business,:marketing,:datascience,:resumelink)");

            $do = $sql->execute(['dated' => $date_clicked, 'name' => $name, 'email' => $email,'mobile' => $mobile,'course' => $course, 'semester' => $semester,'collegename' => $collegename, 'yourinfo' => $yourinfo, 'frontend' => $frontend, 'backend' => $backend, 'fullstack' => $fullstack, 'graphics' => $graphics, 'content' => $content, 'business' => $business, 'marketing' => $marketing, 'datascience' => $datascience, 'resumelink' => $resumelink]);

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
                unset($_SESSION['resumelink']);
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
