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

function mailsend($email, $tid, $name){

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
        $mail->setFrom('team.aparoksha@iiita.ac.in', 'Aparoksha, IIITA');
        $mail->addAddress($email, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('top-coder-instructions.pdf');         // Add attachments
        $mail->addAttachment('Topcoder-Java-Applet-Installation-Guide.pdf');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'HumblefoolCup 2018 | Participation Details | Aparoksha IIITA';
        $mail->Body    = 'Hi <b>'.$tid.'</b>, best wishes of the day from <b>Team Aparoksha</b>.<br><br>
        Your registration for Humblefool Cup’18 is accepted. 
        Prelims for onsite round will be on  <b>Tuesday, 20th Feb, 5:30PM IST</b>. Please make sure that you have registered for the Humblefool Cup on Topcoder Website.
        <br><br>
        Please make note of following points:
        <ul>
        <li>Prelims would on same time as SRM 730.</li>
        <li>Both SRM 730 and Humblefool Cup would be <b>Rated</b>.</li>
        <li>Both SRM 730 and Humblefool Cup would have same problems.</li>
        <li>Make sure that you have registered for Humblefool Cup if you want to be considered for the onsite finals or prizes.</li>
        <li>You are allowed to participate only in <b>one of the above rounds</b>. If a participant is found to be registered for both the rounds, he/she would be <b>disqualified</b>.</li>
        <li>Top 30 participants would be given <b>Topcoder T-Shirts</b> and would be eligible to participate in the <b>onsite finals</b> going to be held on <b>March 17th, 2018</b>. Cash Prizes of <b>$500</b> would be given to the winners of onsite round.</li>
        <li>Basic travel reimbursement would be provided to the top performers of the onsite rounds.</li> 
        <br><br>
        <b>Don’t know how to compete in Topcoder SRMs?</b>
        <br>
        Check out <a href="https://www.topcoder.com/member-onboarding/competing-in-an-algorithm-match-srm/">this guide</a> to successfully compete in an algorithm match.
        You can compete using either the:
        <ul>
        <li><a href="https://arena.topcoder.com/">Topcoder Web Arena(Beta)</a> - Please watch this video for step by step guide.</li>
        <li><a href="http://www.topcoder.com/contest/arena/ContestAppletProd.jnlp">Topcoder Java Applet</a> - You can refer to <a href="https://drive.google.com/open?id=1gVJZxhWYMuUNx3PfSSTkkk-b9AeJkL4j">this guide</a> here to set up the applet. (Note that those who have Java 8 installed on their machines will see a security issue - You will have to add Topcoder in security exceptions in Java Control Panel.
         Please refer to the details in the guide here)</li> 
        </ul>       
        <br><br>
        Please find attached guides for setting up Topcoder applet on your machine, and feel free to shoot us a mail at <a href="mailto:team.aparoksha@iiita.ac.in"><b>team.aparoksha@iiita.ac.in</b></a> in case of any trouble.
        <br><br>
        Thank You<br>
        Happy Coding :)<br>
        Regards, <b>Team Aparoksha</b>';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>