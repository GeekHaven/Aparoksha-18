<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$clicked = false;

if(isset($_POST['sub']) || isset($_POST['sub3'])){
    $clicked = true;
}

if(!$clicked){
    echo '<script language="javascript">';
    echo 'alert("Access Denied")';
    echo '</script>';   
    header("Refresh: 1; url=index.php");
}

function mailsend($email,$orderid){

    //Load composer's autoloader
    require '../../register/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
       $dotenv->load('.env');
    }

    $mailhost = getenv('MAIL_HOST');
    $mailusername = getenv('MAIL_USERNAME');
    $mailpass = getenv('MAIL_PASS');    
    $mailport = getenv('MAIL_PORT');

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $mailhost;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $mailusername;                 // SMTP username
        $mail->Password = $mailpass;                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $mailport;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('events@aparoksha.org', 'Aparoksha, IIITA');
        $mail->addAddress($email, $orderid);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'TShirt Order: Aparoksha Merchandise';
        $mail->Body    = 'Greetings!<br><br>Thanks for ordering merchandise, We have received
                            your request, It can some time to verify your transaction. You can check your transaction 
                            verification status <a href="https://aparoksha.org/tshirt/order/check.php?orderid='.$orderid.'">here</a>. Here is your order detail:<br><br>
                            
                            Order ID: '.$orderid.'<br><br>

                            Check full order details <a href="https://aparoksha.org/tshirt/order/check.php?orderid='.$orderid.'">here</a>.<br><br> 
                            Thanks, <br> Team Aparoksha';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>