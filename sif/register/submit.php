
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
        echo '</script>';   $backend = htmlentities($_POST['backend']);
        header("Refresh: 1; url=index.php");
        exit;
    }

    else{
        //ToDo Client Side handling of empty data
        if(isset($_POST['uemail']) && isset($_POST['uname']) && isset($_POST['mobile']) && isset($_POST['companyname'])){
            $name = htmlentities($_POST['uname']);
            $_SESSION['name'] = $name;
            $email = htmlentities($_POST['uemail']);
            $_SESSION['email'] = $email;
            $mobile = htmlentities($_POST['mobile']);
            $_SESSION['mobile'] = $mobile;
            $companyname = htmlentities($_POST['companyname']);
            $_SESSION['companyname'] = $companyname;
            $companyinfo = htmlentities($_POST['companyinfo']);
            $_SESSION['companyinfo'] = $companyinfo;

            $frontend = isset($_POST['frontend']) ? $_POST['frontend'] : 0;
            if(isset($_POST['frontend'])){$_SESSION['frontend'] = $frontend;}
            $backend = isset($_POST['backend']) ? $_POST['backend'] : 0;
            if(isset($_POST['backend'])){$_SESSION['backend'] = $backend;}                
            $fullstack = isset($_POST['fullstack']) ? $_POST['fullstack'] : 0;
            if(isset($_POST['fullstack'])){$_SESSION['fullstack'] = $fullstack;}
            $graphics = isset($_POST['graphics']) ? $_POST['graphics'] : 0;
            if(isset($_POST['graphics'])){$_SESSION['graphics'] = $graphics;} 
            $content = isset($_POST['content']) ? $_POST['content'] : 0;
            if(isset($_POST['content'])){$_SESSION['content'] = $content;}            
            $business = isset($_POST['business']) ? $_POST['business'] : 0;
            if(isset($_POST['business'])){$_SESSION['business'] = $business;}
            $marketing = isset($_POST['marketing']) ? $_POST['marketing'] : 0;  
            if(isset($_POST['marketing'])){$_SESSION['marketing'] = $marketing;}
            $datascience = isset($_POST['datascience']) ? $_POST['datascience'] : 0;  
            if(isset($_POST['datascience'])){$_SESSION['datascience'] = $datascience;}
      
            $stipend = htmlentities($_POST['stipend']);
            $restrict = htmlentities($_POST['restrict']);
            $year = htmlentities($_POST['year']);
            $_SESSION['stipend'] = $stipend;
            $_SESSION['restrict'] = $restrict;
            $_SESSION['year'] = $year;

            if(!isset($_POST['profiles']) || sizeof($_POST['profiles'])<1 ) {    
                $_SESSION['confirm'] = "Please select at least one recruitment profile";
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
    
            $sql = $conn->prepare("INSERT INTO $tbname (dated,name,email,mobile,companyname,companyinfo,frontend,backend,
                    fullstack,graphic,content,business,marketing,datascience,stipend,restriction,yearallowed) VALUES (:dated,:name,:email,:mobile,:companyname,
                    :companyinfo,:frontend,:backend,:fullstack,:graphic,:content,:business,:marketing,:datascience,:stipend,:restriction,:yearallowed)");

            $do = $sql->execute(['dated' => $date_clicked, 'name' => $name, 'email' => $email,'mobile' => $mobile,'companyname' => $companyname,
                 'companyinfo' => $companyinfo, 'frontend' => $frontend, 'backend' => $backend, 'fullstack' => $fullstack,
                 'graphic' => $graphics, 'content' => $content, 'business' => $business, 'marketing' => $marketing, 'datascience' => $datascience, 'stipend' => $stipend, 'restriction' => $restrict,
                 'yearallowed' => $year]);

            if($do){
                $_SESSION['confirm'] = "You have been registered successfully."; 
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['mobile']);
                unset($_SESSION['companyname']);
                unset($_SESSION['companyinfo']);
                unset($_SESSION['frontend']);
                unset($_SESSION['backend']);
                unset($_SESSION['business']);
                unset($_SESSION['content']);
                unset($_SESSION['fullstack']);
                unset($_SESSION['graphics']);
                unset($_SESSION['stipend']);
                unset($_SESSION['marketing']);
                unset($_SESSION['datascience']);
                unset($_SESSION['year']);
                unset($_SESSION['restrict']);
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
