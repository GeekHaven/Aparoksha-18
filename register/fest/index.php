<?php
session_start();
unset($_SESSION['events']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aparoksha 2018 registrations are open. Dates are 16th- 18th March 2018. Exciting events">
  <meta name="author" content="Aproksha 2018">
  <title>Aparoksha Registrations</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='../../css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">

</head>

<body id="page-top" data-spy="scroll" data-target=".side-menu">
  
      <div class="container-fluid">
        <div class="row hero-header" id="home">
          <div class="col-md-12">
          <a href="https://aparoksha.org"><img src="../../img/apk-logo.png" id="apk-logo" class="logo img-circle img responsive"></a>
            <h1>Aparoksha'18 Registration</h1>
            <h3>Technical fest of IIITA</h3>
            <h4>16<sup>th</sup> to 18<sup>th</sup>  March, 2018</h4>
          </div>
          <!-- <div class="col-md-5">
            <img src="../../img/frag.png" class="rocket animated bounce">
          </div> -->
        </div>
      </div>

      <div class="container">
        <div class="row me-row content-ct">
          <div class="col-md-4" style="margin-top:1em;">
            <a href="index.php" class="btn btn-lg btn-red">Register<i class="fa fa-calendar" aria-hidden="true" style="padding-left:0.6em;"></i>
            </a>
          </div>
          <div class="col-md-4" style="margin-top:1em;">
            <a href="check.php" class="btn btn-lg btn-yellow">Check your status<i class="fa fa-binoculars" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div>
          <div class="col-md-3 col-md-offset-1" style="margin-top:1em;">
              <a href="https://www.facebook.com/aparoksha/" target="_blank" class="btn btn-lg btn-success">Event information<i class="fa fa-info-circle" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div>
        </div>

        <div class="col-md-12 contact-form">
            <h2 class="content-ct" style="font-weight:bold; margin-bottom:1em;"><span class="ti-email"></span> Register Here</h2>
            
            <div class="alert alert-info col-sm-12" id="info" style="margin-bottom:1em; 
            <?php if(isset($_SESSION['confirm'])){echo("display:block;");} else {echo("display:none;");} ?> ">
              <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
            </div>

            <form class="form-horizontal" data-toggle="validator" action="submit.php" role="form" method="post" name="f">
              <div class="form-group">
                <label for="uname" class="col-sm-2 control-label">Name<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="Your Name" value="<?php if (isset($_SESSION['name'])){echo("{$_SESSION['name']}"); unset($_SESSION['name']);} ?>" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="uemail" class="col-sm-2 control-label">Email<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="uemail" name="uemail" placeholder="you@youremail.com" value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email']; unset($_SESSION['email']);} ?>" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Mobile<sup>*</sup></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="xxxxxxxxxx" value="<?php if (isset($_SESSION['mobile'])){echo $_SESSION['mobile']; unset($_SESSION['mobile']);} ?>" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Events Interested<sup>*</sup></label>
                  <div class="col-sm-10">
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="event[]" value="Hackathons"> Hackathons
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="event[]" value="Competitive coding"> Competitive coding
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="event[]" value="Quizzing Events"> Quizzing Events
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="event[]" value="Startup Fair"> Startup Fair
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="event[]" value="Gaming events"> Gaming events
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="event[]" value="Workshops"> Workshops
                      </label>
                    </div>
                  </div>
              </div>
                
              <div class="form-group">
                <div class="col-sm-12" style="text-align:center; margin-top:1em;">
                  <button type="submit" id="submit" name="sub" class="btn btn-yellow">Submit<i class="fa fa-paper-plane" aria-hidden="true" style="padding-left:0.6em;"></i></button>
                </div>
              </div>
            </form>
          </div>
      </div>

      <!-- <div class="container-fluid tickets" id="tickets">
        <div class="row me-row content-ct">
          <h2 class="row-title">Buy Tickets</h2>
          <div class="col-md-4 col-sm-6 col-md-offset-2">
            <h3>Early Bird Ticket</h3>
            <p class="price">$399</p>
            <p>All days entry pass for all the events.</p>
            <a href="#" class="btn btn-lg btn-red">Buy <small>(6 remaining)</small></a>
          </div>
          <div class="col-md-4 col-sm-6">
            <h3>Workshop Pass</h3>
            <p class="price">$199</p>
            <p>Entry pass for each workshop</p>
            <a href="#" class="btn btn-lg btn-red">Buy <small>(42 remaining)</small></a>
          </div>
        </div>
      </div> -->

      <div class="container-fluid footer">
        <div class="col-sm-12" style="text-align:center; margin-top:1em; margin-bottom:0.5em;">
          <h2>Contact info: </h2>
        </div>
        <div class="row contact">
          <div class="col-md-6 contact-form">
            <h4> For website issues:</h3>
              <hr>
              <p> Pradeep Gangwar </p>
              <p> pradeepgangwar39@gmail.com </p>
          </div>
          <div class="col-md-6 contact-form" style="text-align:right;">
            <h4> For event related information:</h3>
              <hr>
              <p> Ashutosh Chandra </p>
              <p> events@aparoksha.org </p>
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

      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/jquery.easing.min.js"></script>
      <script src="../../js/scrolling-nav.js"></script>
      <script src="../../js/validator.js"></script>
     
    </body>
    </html>