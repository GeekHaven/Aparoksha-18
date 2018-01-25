<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../register/vendor/autoload.php';

$clicked = false;

$company_name = $_POST['company_name'];
$email = $_POST['email'];
$cc = $_POST['cc'];
$bcc = $_POST['bcc'];
$sender_contact = $_POST['sender_contact'];
$company_type = $_POST['company_type'];
$sender_name = $_POST['sender_name'];

if(isset($_POST['sub']) && isset($_POST['company_name']) && isset($_POST['email']) && isset($_POST['sender_contact']) && isset($_POST['sender_name'])){
    $clicked = true;
}

if(!$clicked){
    echo '<script language="javascript">';
    echo 'alert("Please fill all the details")';
    echo '</script>';   
    header("Refresh: 1; url=index.php");
}

// function mailsend($email,$hash, $name){

    //Load composer's autoloader

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
        $mail->addAddress($email, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        if(isset($cc)) {
            $mail->addCC($cc);
        }
        if(isset($bcc)) {
            $mail->addBCC($bcc);
        }

        //Attachments
        if($company_type == "Domestic" ) {
            $mail->addAttachment('attachment/Sponsorship Brochure-Domestic-Aparoksha 2018-IIIT Allahabad.pdf');
            $mail->addAttachment('attachment/Avenues-of-Branding-Domestic-Aparoksha-2018-IIIT-Allahabad.pdf');
        }
        else if($company_type == "International" ) {
            $mail->addAttachment('attachment/Sponsorship Brochure-International-Aparoksha 2018-IIIT Allahabad.pdf');
            $mail->addAttachment('attachment/Avenues-of-Branding-International-Aparoksha-2018-IIIT-Allahabad.pdf');
        }

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Avenues of branding for '.$company_name.' in Aparoksha, 2018';
        $mail->Body    = 'Respected Sir/Mam,  

 

<b>Aparoksha</b> is the annual technical fest of <b>IIIT Allahabad</b> (A Centre of Excellence in Information Technology established by Ministry of HRD, Govt. of India). 

<b>Aparoksha</b> is a collaboration of tech enthusiasts to code, design and build innovative solutions to transform India into a digitally empowered society and a knowledge based economy and provides a venue for self-expression and creativity through technology.

 

Building upon last year’s impressive footfall of 5000+, <b>Aparoksha ’18</b> is expected to have a promising footfall of 7000+ technophiles who come together to interact, share and discuss the latest happenings in the fields of Information Technology and Electronics.

<b>Aparoksha ’18</b> has a plethora of intensive and gripping technical events which attract participants and audience from technical circles all over the country. Our flagship events include: 

<b>Hack In the North</b>, the largest student held Hackathon in North India organised by <b>GitHub</b> and <b>TopCoder</b>. 

<b>Gray Hound</b>, a national level quizzing event organised across various schools and colleges in all parts of the country. <b>Nova</b>, a national level design contest for all the Machiavelli’s of the digital era. 

<b>Tech Tour</b>, an initiative taken by the Technical Society of IIIT Allahabad to conduct workshops and talks in various colleges in order to increase technical awareness and build enthusiasm of people from all backgrounds of Science. Topbot, the flagship Robotics contest of Aparoksha ‘18 caters to the hunger of robogeeks with captivating themes like Bolt Hurdle Race and JARVIS.

<b>FragFest</b>, one of the most anticipated events of Aparoksha is every gamer’s asylum, seeing participation in the hundreds every year comes together this year as an overnight onstage gaming event in the format of the big leagues.

<b>TopCoder Humblefool Cup</b>,a 2-tier ACM-ICPC style national level coding contest organised in honor of Harsha Suryanarayana, an alumnus of IIIT Allahabad, who was one of the greatest coders India has ever produced.

Apart from core technical events, <b>Aparoksha ’18</b> boasts of riveting quizzes, movie screenings, a much awaited <b>Comedy Night</b> and to end it all, a grand after party.

<b>Aparoksha, 2018</b> promises to deliver on the success of yesteryear and shall continue to captivate everyone over the course of 3 days.    

On this note, I, Shreyansh Dwivedi, would like to take this opportunity to request a sponsorship association between <b>Aparoksha</b> and <b>'.$company_name.'</b>. We hope that this leads to the development of a long and fruitful relationship between <b>'.$company_name.'</b> and <b>IIIT Allahabad</b>.  

Attached is the <b>Sponsorship Brochure</b> <b>Avenues of Branding Brochure</b> elaborating on the branding opportunities in Aparoksha, 2018.

We look forward to have an in-person or video meeting with you.

Thanking You,

'.$sender_name.' | '.$sender_contact.'

Aparoksha, 2018

IIIT Allahabad';

        $mail->send();
        $_SESSION['success'] = "Your mail has been sent successfully";
    } catch (Exception $e) {
        $_SESSION['success'] = "There was an error sending mail. Please try again.";
    }
//}
?>