
<?php

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

    if(isset($_POST['submit'])){
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
        if(isset($_POST['orderno'])){
            $orderid = htmlentities($_POST['orderno']);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Some Error!")';
            echo '</script>';   
            header("Refresh: 1; url=verify.php");
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

            $sql = $conn->prepare("UPDATE $tbname SET verified='true' WHERE order_no=$orderid");
            $do = $sql->execute();

            if($do){
                $_SESSION['confirm'] = "Order no was updated"; 
                header("Refresh: 0; url=verify.php#info");
                exit;
            }
                  
            else{
                $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with your order. Please
                                        try again after some time. If problem persists please feel free to contact any person mentioned below ";
                header("Refresh: 0; url=verify.php#info"); 
                exit;
            }
                
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with your order. Please
            try again after some time. If problem persists please feel free to contact any person mentioned below ";
            header("Refresh: 0; url=verify.php#info");
            exit;
        }
        $clicked = false;
        $conn = null;
    }

?>
