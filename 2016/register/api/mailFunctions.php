<?php

require_once("business/Phpmailer.class.php");


function sendAccountConfMail($username)
{
	$account = getAccountbyname($username);
	$email = $account[0]['email'];
	$code = $account[0]['code'];
	$url = URL. "?page=confirm&code=" .$code;
	$url .= "&token=sadb153nfalopadityatuie7nxcvgRTyhjdfbnUjatinInmakloso90";
	$subject = SUBSCRIBE_SUBJECT;
	$username = $account[0]['username'];
	$body = "<html>
	<head>

	</head>
	<body>
		Hi {$username},<br> 
		This is a confirmation mail for IIIT-Allahabad Aparoksha 2016 user account. <br>
		Please click the following link to validate your account. <br><br> 
		<a href='{$url}' >Click to Confirm.</a><br><br>

		Thank You for connecting with Aparoksha 2016<br><br><br>
		
		For any queries please mail to <a href='mailto:team.aparoksha@iiita.ac.in'>team.aparoksha@iiita.ac.in</a><br><br>

		--<br>

		<i>This email has been generated automatically. Please do not reply.</i>
	</body>
</html>" ;
	
	if (sendMail($email, $subject, $body)) {
		return 1;
	} else {
		return 0;
	}
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
	//$mail->AddEmbeddedImage('img/qrcode.jpg', 'qrcode');
	$mail->MsgHTML($body);
	//echo $body;
	$mail->IsHTML(true);
	$mail->SetFrom(MAIL_FROM, 'Team Aparoksha');
	$mail->From = MAIL_FROM;    //From Address -- CHANGE --^M
	$mail->FromName = "Team Aparoksha";    //From Name -- CHANGE --^M
	$mail->AddAddress($subscriberEmail, "");    //To Address -- CHANGE --^M
	
	if(!$mail->Send()) {
			return 0;
	}
	return 1;
}
?>	
