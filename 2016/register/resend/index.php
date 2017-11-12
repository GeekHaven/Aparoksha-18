<?php

require_once("../config/config.php");

require_once("../models/database.php");

require_once("../api/contentFunctions.php");
require_once("../api/sessionFunctions.php");

require_once("../business/Database_handler.class.php");
require_once("../business/Link.class.php");
require_once("../business/Phpmailer.class.php");

function sendAccountConfMail($username)
{
        $account = getAccountbyname($username);
        $email = $account[0]['email'];
        $code = $account[0]['code'];
        $url = URL. "?page=confirm&code=" .$code;
        $url .= "&token=sadb153nfalopadityatuie7nxcvgRTyhjdfbnUjatinInmakloso90";
        $subject = "Aparoskha Account Activation";
	$username = $account[0]['username'];
     	$body = "Howdy {$username}, <br> Your email verification for APAROKSHA 2015 is still pending. <br>In order to activate your account click on the link below. <br><br> <a href='{$url}' >Click to Confirm.</a><br><br><br> <p>Contact: team.aparoksha@iiita.ac.in for any assistance." ;
//       $body = "Hi {$username}, <br>  This is an account confirmation mail for Effe2013. <br>To be able to participate in various events during this Effervescence please click the following and activate your account. <br><br> <a href='{$url}' >Click to Confirm.</a>" ;

        sendMail($email, $subject, $body);
        return 1;
}

function sendMail( $subscriberEmail, $subject, $body)
{
        $timezone = "Asia/Calcutta";
        date_default_timezone_set($timezone);
        $mail  = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP();    // set mailer to use SMTP^M
        $mail->Host = MAIL_HOST;    // specify main and backup server^M
        $mail->SMTPAuth = true;    // turn on SMTP authentication^M
        $mail->Username = MAIL_FROM;    // Gmail username for smtp.gmail.com -- CHANGE --^M
        $mail->Password = MAIL_FROM_PWD;    // SMTP password -- CHANGE --^M
        $mail->Port = MAIL_PORT;    // SMTP Port^M
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $mail->IsHTML(true);
        $mail->SetFrom(MAIL_FROM, 'Aparoksha IIITA');
        $mail->From = MAIL_FROM;    //From Address -- CHANGE --^M
        $mail->FromName = "APO 2015";    //From Name -- CHANGE --^M
        $mail->AddAddress($subscriberEmail, "");    //To Address -- CHANGE --^M

        if(!$mail->Send()) {
                        return 0;
        }
        return 1;
}

/*
function sendMail( $subscriberEmail, $subject, $body)
{
        $timezone = "Asia/Calcutta";
        date_default_timezone_set($timezone);
        $mail  = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP();    // set mailer to use SMTP^M
        $mail->Host = "ssl://smtp.gmail.com";    // specify main and backup server^M
        $mail->SMTPAuth = true;    // turn on SMTP authentication^M
        $mail->Username = "noreply.effe@gmail.com";    // Gmail username for smtp.gmail.com -- CHANGE --^M
        $mail->Password = "effemm13";    // SMTP password -- CHANGE --^M
        $mail->Port = 465;    // SMTP Port^M
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $mail->IsHTML(true);
        $mail->SetFrom(MAIL_FROM, 'SEffervescence IIITA');
        $mail->From = MAIL_FROM;    //From Address -- CHANGE --^M
        $mail->FromName = "Effervescence IIITA";    //From Name -- CHANGE --^M
        $mail->AddAddress($subscriberEmail, "");    //To Address -- CHANGE --^M

        if(!$mail->Send()) {
                        return 0;
        }
        return 1;
}
*/

function getInactiveUsers() {
	$sql = "SELECT * FROM `users` WHERE isactive=0 AND isdeleted=0 ORDER BY `added_on` DESC LIMIT 151,200";
	$result = DatabaseHandler::GetAll($sql);
	return $result;
}

function updateIssent($username) {
	$sql = "UPDATE users SET issent=1 WHERE username=:username";
	$params =  array(':username' => $username);
	$result = DatabaseHandler::Execute($sql, $params);
}

$iUsers = getInactiveUsers();

for($i = 0; $i < count($iUsers); $i++) {
	echo $iUsers[$i]['email'] . "<br/>";
	
	sendAccountConfmail($iUsers[$i]['username']);	
	updateIssent($iUsers[$i]['username']);
}
	sendAccountConfmail('testingAgain');
	updateIssent('testingAgain');


?>
