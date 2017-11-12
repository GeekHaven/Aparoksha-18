<?php
include_once("config.php");
include_once("includes/functions.php");
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
		header("Location: index.php");
}else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
	if(!empty($user_data)){
		$data_query = mysqli_query($user->connect,"SELECT * from users WHERE id = ".$user_data['id']);
		$data = mysqli_fetch_array($data_query);
		$score = 0;
		$i = 1;
		while($data["q".$i] != 0 && $i <= 30){
			$score += $data["q".$i];
			$i++;
		}
		if($score>=30){
			header("Location: leaderboard.php");
		}
		$ques_query = mysqli_query($user->connect,"SELECT * FROM questions WHERE ques = ".($score + 1));
         $ques_result = mysqli_fetch_array($ques_query);
         $content = $ques_result['content'];
		//echo "score = ".$score;
		$output = "";
		if(isset($_POST['submit']) && $score<=30){
			$ques = $score + 1;
		 $answer = $_POST['answer'];
		 $query = mysqli_query($user->connect,"SELECT * FROM questions WHERE ques = ".$ques);
		 $result = mysqli_fetch_array($query);
		 $qans = $result['answer'];

		 if(md5($answer) == $qans){
		 	if(mysqli_query($user->connect,"UPDATE users SET q".$ques." = 1, score = ".$ques.", qtime = now() WHERE id = ".$user_data['id'])){
		 		header("Location: play.php");
		 	} else {
		 		
		 		header("Location: play.php");
		 	}	
		 }else{
		 		?><script>alert("Wrong Answer")</script><?php		 	
		 	}
		}
		
	}else{
		header("Location: index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Perplexus '17</title>

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
                        <img src=<?php echo '"'.$user_data['picture'].'"' ?> class="img-circle">
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
                                <li><a href="https://www.facebook.com/events/1286854231392911/?active_tab=discussion" class="waves-effect">Hints</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="https://aparoksha.iiita.ac.in/" class="collapsible-header waves-effect "><i class="fa fa-money"></i> Perplexus '17</i></a>
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
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i><span style="margin-left: 10px;">Perplexus '17</span></a>

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
      		<li>Search engines are your best friend. Don't be shy to google anything you wish to.</li>
      		<li>Look out for hints in the page, For instance,
the answer of the first question is ‘Green Apple’. Which should be answered as ‘greenapple’.</li>
      		<li>Remember this is a competition and ruining any question by sharing answers is prohibited. Everyone is being monitored. Any discrepancies will imply immediate disqualification.</li>
      		<li>Any suspicious activty like sharing answers or solving together will get you banned from the website or disqualified and barred from getting any prize/goodies. Security Breaches or attempted security breaches will get you banned as well.</li>
      		<li>The decision made by organizers would be final.</li>
      		<li>Prizes and winners will be declared after the event ends.According to the Leaderboard.</li>
      		
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
            <li>VikaSh - <a href="https://www.facebook.com/profile.php?id=100004191281432&fref=ts">Contact on Facebook</a></li>
            <li>Abhishek - +91 8603111470 - <a href = "https://www.facebook.com/abhishekdnandan">Contact on Facebook</a></li>
            <li>Pranjal - +91 9726292862 - <a href="https://www.facebook.com/pasanjanwala">Contact on Facebook</a></li>
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