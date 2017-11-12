<?php
include_once("config.php");
include_once("includes/functions.php");
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>"https://aparoksha.iiita.ac.in/Perplexus/",'scope'=>$fbPermissions));
	//$output = '	<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>'; 	
	$output='<br><br><br>
<div class = "continer">
  <div class = "row">
  
    <div class = "col-lg-6">
      <div class="type-wrap">
            <div id="typed-strings">
                <span>Perplexus is back!</span>
                <p>Hack.Decode.Enjoy.</p>
                <p>Something exciting awaits you.Lets go.</p>
              <!--   <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p> -->
            </div>
            <span id="typed" style="white-space:pre;"></span>
        </div>
        <a class="btn btn-success" href="'.$loginUrl.'" id = "lbtn" role="button" value="Login"> </a>
      <input type = "button" id = "mbtn" class = "btn btn-success" value = "Shoot!" style="background:#00A9F9;border:0px;"/>

 
    </div>
  </div>
</div>
 <div id = "bottomwrapper"></div>';
}else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
	if(!empty($user_data)){
    header("Location: play.php");
		$output = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$user_data['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $user_data['oauth_uid'];
        $output .= '<br/>Name : ' . $user_data['fname'].' '.$user_data['lname'];
        $output .= '<br/>Email : ' . $user_data['email'];
        $output .= '<br/>Gender : ' . $user_data['gender'];
        $output .= '<br/>Locale : ' . $user_data['locale'];
        $output .= '<br/>You are login with : Facebook';
        $output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>'; 
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
        <link rel="stylesheet" href="css/style.css">
    
  <script src="js/modernizr.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <script src="js/jquery.js"></script>

  <script src="js/bootstrap.js"></script>
  <script type ="text/javascript" src="js/typed.js"></script>
<link rel="stylesheet" href="css/bootstrap.css" >
<script src = "https://use.fontawesome.com/994d7c72ea.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<title>perplexus</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
<div>
<?php echo $output; ?>
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