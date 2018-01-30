<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="HumblefoolCup Aparoksha 2018">
  <meta name="author" content="Aparoksha">
  <title>Humblefool cup | Aparoksha'18</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="shortcut icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href='../../css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>


<div class="container" style="margin-top: 2em;">
    <div class="row text-center text-md-center">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a target="_blank" href="https://topcoder.com" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail img-responsive" src="../../img/tc-logo.jpg" alt="">
        </a>
      </div> 
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a target="_blank" href="https://aparoksha.org" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail img-responsive" src="../../img/apk-logo.png" alt="" style="max-height:200px;">
        </a>
      </div> 
    </div>
</div>

<div class="container" style="margin-top: 2em; color:white;">
    <div class="row text-center text-md-center">
      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <h3> Presents </h3>
      </div> 
      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <h3> HumblefoolCup 2018 </h3>
      </div> 
    </div>
</div>


<div class="container">
  <div class="row text-center text-md-center">
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <!-- multistep form -->
        <form method="post" id="msform" action ="submit.php">
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>College details </li>
            <li>Personal Details</li>
          </ul>
          <!-- fieldsets -->
          <fieldset>
            <h2 class="fs-title">Some personal Details</h2>
            <h3 class="fs-subtitle">Please fill all details</h3>
            <input type="text" name="firstname" placeholder="First Name (Required)" required/>
            <input type="text" name="lastname" placeholder="Last Name (Required)" required/>
            <input type="email" name="email" placeholder="E-mail (to get confirmation mail)" required />
            <input type="button" name="next" class="next action-button" value="Next" />
          </fieldset>
          <fieldset>
            <h2 class="fs-title">College details</h2>
            <h3 class="fs-subtitle">Your college details</h3>
            <input type="text" name="cname" placeholder="College name (Required)" required/>
            <input type="text" name="cid" placeholder="Enrollment no./college ID" />
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
          </fieldset>
          <fieldset>
            <h2 class="fs-title">Topcoder</h2>
            <h3 class="fs-subtitle">Link your topcoder account</h3>
            <input type="text" name="tid" placeholder="TopCoder username (Required)" required/>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="sub" class="submit action-button" value="submit" />
          </fieldset>
        </form>
    </div>
  </div>
</div>



    <div class="container-fluid footer">
        <hr class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="col-sm-12" style="text-align:center; margin-top:1em; margin-bottom:0.5em;">
          <h4>Contact info: </h4>
        </div>
        <div class="row contact">
          <div class="col-md-6 contact-form">
            <h5> For website issues:</h5>
              <hr>
              <p> Team Web Operations </p>
              <p><i class="fa fa-envelope" aria-hidden="true" style="padding-right:5px;"></i><a href="mailto:pradeepgangwar39@gmail.com">pradeepgangwar39@gmail.com</a></p>
          </div>
          <div class="col-md-6 contact-form" style="text-align:right;">
            <h5> For event related information:</h5>
              <hr>
              <p> Hariom Niranjan </p>
              <p> events@aparoksha.org </p>
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9919241909</p>
          </div>
        </div>
        <div class="row footer-credit">
          <div class="col-md-6 col-sm-6">
            <p>&copy; 2018, <a href="http://aparoksha.org">Aparoksha</a></p>
          </div>
          <div class="col-md-6 col-sm-6"> 
            <ul class="footer-menu">
            <li><a href="https://www.facebook.com/aparoksha/" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/aparoksha_org" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true" style="padding-left:0.4em;"></i></a></li>
            <li><a href="https://www.instagram.com/aparokshaiiita/" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true" style="padding-left:0.4em;"></i></a></li>
            <li><a href="https://medium.com/the-aparoksha-blog" target="_blank"><i class="fa fa-medium fa-2x" aria-hidden="true" style="padding-left:0.4em;"></i></a></li>
          </ul>
          </div>
        </div>
      </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="js/index.js"></script>    

</body>
</html> 
