
<?php
// include the phpmailer class file
require_once "phpmailer/class.phpmailer.php";

// my message to send to the user
$lastID = $DB->lastInsertId();

$message = '<html><head>
           <title>Email Verification</title>
           </head>
           <body>';
$message .= '<h1>Hi ' . $name . '!</h1>';
$message .= '<p><a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
$message .= "</body></html>";

// php mailer code starts
$mail = new PHPMailer(true);
// telling the class to use SMTP
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;   
// sets the prefix to the server
$mail->SMTPSecure = "ssl"; 
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com"; 
// set the SMTP port for the GMAIL server
$mail->Port = 465; 

// set your username here
$mail->Username = 'youremail@gmail.com';
$mail->Password = 'your password';

// set your subject
$mail->Subject = trim("Email Verifcation - www.thesoftwareguy.in");

// sending mail from
$mail->SetFrom('youremail@gmail.com', 'Your Name');
// sending to
$mail->AddAddress($email);
// set the message
$mail->MsgHTML($message);

try {
  $mail->send();
} catch (Exception $ex) {
  echo $msg = $ex->getMessage();
}
?>