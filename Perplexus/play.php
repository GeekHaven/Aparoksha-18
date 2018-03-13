<?php
session_start();
require __DIR__.'/vendor/autoload.php';

// include_once("config.php");
 include_once("includes/functions.php");
//destroy facebook session if user clicks reset
require_once __DIR__ . '/facebook/php-graph-sdk-5.6.1/src/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
	  'app_id' => '657518504639656',
	  'app_secret' => '2babbc4daca70551497f7783c3f229b8',
	  'default_graph_version' => 'v2.5',
	]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: ./');
	}
	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$fbuser = $profile_request->getGraphUser();
		$user_profile = $profile_request->getGraphNode()->asArray();
		$requestPicture = $fb->get('/me/picture?redirect=false&height=300'); //getting user picture
		$picture = $requestPicture->getGraphUser();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	// printing $profile array on the screen which holds the basic info about user
}
	if($fbuser){
	    $user = new Users();
		$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$picture['url']);
	
		$dotenv = new Dotenv\Dotenv(__DIR__);

		if (file_exists(__DIR__.'.env')) {
			$dotenv->load('.env');
		}
		
		
		$dbhost = getenv('DB_HOST');
		$dbuser = getenv('DB_USER');
		$dbpass = getenv('DB_PASS');
		$dbn = getenv('DB_NAME');
		
		//database configuration
		$dbServer = $dbhost; //Define database server host
		$dbUsername = $dbuser; //Define database username
		$dbPassword = $dbpass; //Define database password
		$dbName = $dbn; //Define database name
		$table_name = 'users';

		$conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("SELECT * from users WHERE oauth_uid = ".$fbuser->getId());
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$score = 0;
		$i = 1;
		while($data["q".$i] != 0 && $i <= 30){
			$score += $data["q".$i];
			$i++;
		}
		if($score>=30){
			header("Location: leaderboard.php");
		}
		$ques_query = $conn->prepare("SELECT * FROM questions WHERE ques = ".($score + 1));
		$ques_query->execute();
		$ques_result = $ques_query->fetch(PDO::FETCH_ASSOC);
        $content = $ques_result['content'];
		$output = "";
		
		if(isset($_POST['submit']) && $score<=30){
		$ques = $score + 1;
		 $answer = $_POST['answer'];
		 //echo "hdfuhd";
		 $query = $conn->prepare("SELECT * FROM questions WHERE ques = ".$ques);
		 $query->execute();
		 $result = $query->fetchAll(PDO::FETCH_ASSOC);
		 $qans = $result['answer'];
		 if(md5($answer) == $qans){
			$query1 = $conn->prepare("UPDATE users SET q".$ques." = 1, score = ".$ques.", qtime = now() WHERE oauth_uid = ".$user_profile['id']);
		 	if($query1->execute()){
	
		 		header("Location: play.php");
		 	} else {
		 		?><script>alert("Unable to update score")</script><?php	
		 		header("Location: play.php");
		 	}	
		 }else{
		 		?>
		 		
		 		<?php		 	
		 	}
		}
		
	}
		// Print the user Details
	else {
	   // header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
   
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aparoksha'18 | Perplexus 2.0</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/play.css">



    <style>
        
    </style>

</head>

<body class="fixed-sn dark-skin">

    <header>

       
        <ul id="slide-out" class="side-nav fixed custom-scrollbar">

            <li>
                <div class="logo-wrapper waves-light sn-avatar-wrapper">
                    <a href="#">
                        <img src=<?php echo '"'.$picture['url'].'"' ?> class="img-circle">
                    </a>
                </div>
            </li>
      
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a href="leaderboard.php" class="collapsible-header waves-effect"><i class="fa fa-code"></i> Leaderboard</a> 
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-bank"></i> How To Play<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#rules" class="waves-effect">Rules</a>
                                </li>
                                <li><a href="https://www.facebook.com/events/1992044107749486/?active_tab=discussion" target="_blank" class="waves-effect">Hints</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="https://aparoksha.org/Perplexus" class="collapsible-header waves-effect "><i class="fa fa-money"></i> Perplexus 2.0</i></a>
                    </li>
                    <li><a href="#contact" class="collapsible-header waves-effect"><i class="fa fa-pencil"></i> Contact</a>
                    </li>
                    <li><a href="#about" class="collapsible-header waves-effect "><i class="fa fa-user"></i> About</a>
                 
                    </li>

                    <li><a href="logout.php?logout"class="collapsible-header waves-effect "><i class="fa fa-sign-out"></i> Logout</a>
                        
                    </li>
                </ul>
            </li>

        </ul>
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

            <div class="pull-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i><span style="margin-left: 10px;">Perplexus 2.0</span></a>

            </div>

      

    </header>
  
    <main class="">
        <div class="container-fluid text-xs-center" style="height: 75vh;">
          
            <div class = "main-content">        <?php echo $content; ?></div>

           <form class="col s12 footer" method="post">
<div class="row">
        <div class="input-field col s12">
          <input id="answer" name="answer" type="text" class="validate">
          <label  for="answer">Answer to question <?php echo ($score + 1) ?></label>
          </div>
          <div class="input-field col s12">
          <button class="btn btn-primary btn-lg" style="display: inline-block;" type="submit" name="submit">submit</button>
          </div>
 </div>      

</form>

        </div>

    </main>

 
<div id="popup2" class="overlay light">
	<a class="cancel" href="#"></a>
	<div class="popup">
		<h2>What the what?</h2>
		<div class="content" >
      		<p>Click outside the popup to close.</p>
		</div>
	</div>
</div>

<div id="rules" class="overlay light">
	<a class="cancel" href="#"></a>
	<div class="popup">
		<h2>RULES</h2>
		<div class="content" >
      		<ol >
      		<li>Google is your best friend. Google the hell out.Sometimes source code too.</li>
      		<li>Mods are assholes, don't message them. You might be blocked. Comment on the event page instead.</li>
      		<li>Remember this is a competition and ruining any question by sharing answers is prohibited. Everyone is being monitored. Any discrepancies will imply immediate disqualification.</li>
      		<li>Any suspicious activity like sharing answers or solving together will get you banned from the website or disqualified and barred from getting any prize/goodies. Security Breaches or attempted security breaches will get you banned as well.</li>
      		<li>The decision made by organizers would be final.</li>
      		<li>Prizes and winners will be declared as per the following scheme:
      		    <ul>
      		        <li>First person to cross Level 11 shall secure at least 3rd position, Level 21, 2nd and Level 30, 1st.</li>
      		        <li>If the same person crosses these levels first then the subsequent prizes will be given to the next person to do so.</li>
      		    </ul>
      		</li>
      		<li>Enter all the answer in lowercase-alphanumerics allowed, e.g. Perplexus will be entered as perplexus.If there is any specific answer input format we'll let you know</li>
      		</ol>
		</div>
	</div>
</div>


<div id="about" class="overlay light">
    <a class="cancel" href="#"></a>
    <div class="popup">
        <h2>ABOUT</h2>
        <div class="content" >
            <p>Have you ever wished to participate in several treasure hunt events, but coudn't because you were to lazy to get out of your room?</p>
            <p>Played the real life version of treasure hunt, but let’s face it, it’s unfair 😉</p>
            <p>Enter Perplexus.We are fair. Only the worthy shall pass.</p>
            <p>Perplexus allows you to experience the thrill of a real treasure hunt from the comfort of your room.</p>
            <p>Look for clues, take help from every scam, con, hustle, trickery, gambit, flimflam and stratagem and bamboozle whosoever you can think of to reach the final destination and win the prize.</p>
            <p>Perplexus is a full fledged dedicated event for online treasure hunt.</p>
            <p>You just need to dig out answers to uncover the next clue and cross various levels to win several prizes...</p>
        </div>
    </div>
</div>

<div id="contact" class="overlay light">
    <a class="cancel" href="#"></a>
    <div class="popup">
        <h2>CONTACT</h2>
        <div class="content" >
            <ol>
            <li>VikaSh - <a href="https://www.facebook.com/TheAWENEST">Contact on Facebook</a></li>
            <li>Abhishek - +91 8603111470 - <a href = "https://www.facebook.com/abhishekdnandan">Contact on Facebook</a></li>
            
            </ol>
        </div>
    </div>
</div>



    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

   
    <script type="text/javascript" src="js/tether.min.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
        $(".button-collapse").sideNav();

        var el = document.querySelector('.custom-scrollbar');

        Ps.initialize(el);
    </script>


</body>

</html>