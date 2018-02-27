
<?php
session_start();

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
        if(isset($_POST['uname']) && isset($_POST['mobile']) && isset($_POST['uemail']) && isset($_POST['attend'])
            && isset($_POST['date'])) {

            $name = htmlentities($_POST['uname']);
            $email = htmlentities($_POST['uemail']);
            $mobile = htmlentities($_POST['mobile']);
            $date = htmlentities($_POST['date']);
            $attend = htmlentities($_POST['attend']);
            $topcoder_handle = $_SESSION['username'];

            if($attend === 'no'){
                $date = "NA";
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
            $target_dir = "/var/www/uploads/";
            $target_file = $target_dir . $topcoder_handle;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
        
            $check = getimagesize($_FILES["input-file-preview"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                //echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["input-file-preview"]["size"] > 500000) {
                //echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], $target_file)) {
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
            }
            echo $target_dir;
            echo $target_file;
            exit;

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
           
            $sql = $conn->prepare("INSERT INTO $tbname (upload_date,topcoder_handle,name,email,mobile,attending,arrival_date_time,id_card) VALUES (:dated,:topcoder_handle,:name,:email,:mobile,:attending,:arrival_date_time,:id_card)");
            $do = $sql->execute(['dated' => $date_clicked ,'topcoder_handle' => $topcoder_handle ,'name' => $name, 'email' => $email, 'mobile' => $mobile, 'attending' => $attend,'arrival_date_time' => $date, 'id_card' => $target_file]);

            if($do){
                $_SESSION['confirm'] = "Your details have been recorded. We are looking forward to welcome you at IIITA. All the best :)"; 
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
