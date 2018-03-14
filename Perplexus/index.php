<?php
	session_start();
	require_once __DIR__ . '/facebook/php-graph-sdk-5.6.1/src/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
	  'app_id' => '657518504639656',
	  'app_secret' => '2babbc4daca70551497f7783c3f229b8',
	  'default_graph_version' => 'v2.5',
	]);
	$redirect = "https://aparoksha.org/Perplexus/play.php";
    $helper = $fb->getRedirectLoginHelper();
    
	if (isset($_SESSION['facebook_access_token'] )) {
		header("Location: play.php");
		
	}else{
		$permissions  = ['email'];
        $loginUrl = $helper->getLoginUrl($redirect,$permissions);
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
        
    
  <script src="js/modernizr.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <script src="js/jquery.js"></script>

  <script src="js/bootstrap.js"></script>
  <script type ="text/javascript" src="js/typed.js"></script>
<link rel="stylesheet" href="css/bootstrap.css" >
<script src = "https://use.fontawesome.com/994d7c72ea.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<title>Perplexus| Aparoksha 18</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
<div>
<br><br><br>
<div class = "container">
  <div class = "row">
  
    <div class = "col-lg-6">
      <div class="type-wrap center">
            <div id="typed-strings">
                <span style="letter-spacing:3px">    Aparoksha 2018 welcomes you</span>
                <p>     We are back with Perplexus </p>
                <p>Let's get started. Login with facebook to  continue.</p>
            </div>
            <span id="typed" style="white-space:pre;"></span>
        </div>
        <a class="btn btn-success" href="<?php echo $loginUrl ?>" id = "lbtn" role="button" value="Login"> </a>
      <!--<input type = "button" id = "mbtn" class = "btn btn-success" value = "" style="background:rgba(0,0,0,0.06);border:0px;"/>-->
      <a class="btn btn-success" href="<?php echo $loginUrl ?>" id = "lbtn" role="button" value="Login"> </a>

 
    </div>
  </div>
</div>
 <div id = "bottomwrapper"></div>
</div>
</div>

</body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.4/TweenMax.min.js'></script>
            <script type ="text/javascript" src="js/typed.js"></script>
        <script src="js/index.js"></script>    
        <script type="text/javascript">

    $(function(){
        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: true,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }


</script>
</html>