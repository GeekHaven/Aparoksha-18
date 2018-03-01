
<?php
session_start();

require '../vendor/autoload.php';

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
        if(isset($_POST['uname']) && isset($_POST['college']) && isset($_POST['hostel']) && isset($_POST['room'])
            && isset($_POST['ttype']) && isset($_POST['mobile']) && isset($_POST['paidon']) && isset($_POST['tranid']) && isset($_POST['amount'])){
            $name = htmlentities($_POST['uname']);
            $college = htmlentities($_POST['college']);
            $hostel = htmlentities($_POST['hostel']);
            $room = htmlentities($_POST['room']);
            $mobile = htmlentities($_POST['mobile']);
            $ttype = htmlentities($_POST['ttype']);
            $tsize = htmlentities($_POST['tsize']);
            $quantity = htmlentities($_POST['quantity']);
            $tranid = htmlentities($_POST['tranid']);
            $paidon = htmlentities($_POST['paidon']);
            $tranvia = htmlentities($_POST['tranvia']);
            $amount = htmlentities($_POST['amount']);
            $verified = "false";
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

            $sql = $conn->prepare("INSERT INTO $tbname (order_time,name,college,mobile,room,hostel,t_type,t_size,t_quantity,amount_paid,trans_id,paid_on,paid_via,verified) VALUES 
                                                        (:order_time,:name,:college,:mobile,:room,:hostel,:t_type,:t_size,:t_quantity,:amount_paid,:trans_id,:paid_on,:paid_via,:verified)");
            $do = $sql->execute(['order_time' => $date_clicked ,'name' => $name, 'college' => $college,'mobile' => $mobile,'room' => $room, 'hostel' => $hostel, 't_type' => $ttype,
                                    't_size' => $tsize, 't_quantity' => $quantity, 'amount_paid' => $amount, 'trans_id' => $tranid, 'paid_on' => $paidon, 'paid_via' => $tranvia, 'verified' => $verified ]);

            if($do){
                $_SESSION['confirm'] = "Your order has been placed successfully. Allow us some time to verify your transaction. 
                                        You can check your payment verification status by clicking on <b>check your status</b> button"; 
                header("Refresh: 0; url=index.php#info");
                exit;
            }
                  
            else{
                $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with your order. Please
                                        try again after some time. If problem persists please feel free to contact any person mentioned below ";
                header("Refresh: 0; url=index.php#info"); 
                exit;
            }
                
        }
        
        catch(PDOException $e){
            $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with your order. Please
            try again after some time. If problem persists please feel free to contact any person mentioned below ";
            header("Refresh: 0; url=index.php#info");
            exit;
        }
        $clicked = false;
        $conn = null;
    }

?>
