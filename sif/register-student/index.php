<?php
session_start();
unset($_SESSION['profiles']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Startup Intern Fair registrations are open. Dates are 16th- 18th March 2018.">
  <meta name="author" content="Aproksha 2018">
  <title>Startup Intern Fair Registrations</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='../../css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">

</head>

<body id="page-top" data-spy="scroll" data-target=".side-menu" style="background-image: url(../../img/sif-bg.png);">
      <a href="../index.html" style="text-decoration: none;color: black;"><i class="fa fa-arrow-left" aria-hidden="true" style="color: black; font-size: 25px;padding-left: 1%;padding-top: 1%;padding-bottom: 1%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 20px;font-weight: 400;">BACK</b></a>
      <div class="container-fluid">
        <div class="row hero-header" id="home"  style="color:black; background-color:transparent;"> 
          <div class="col-md-7">
            <img src="../../img/sif-2.png" class="logo img-rounded">
            <h1 id="startupheading">Startup Intern Fair</h1>
            <h3>Aparoksha'18 | IIIT Allahabad</h3>
            <h4>16<sup>th</sup> to 18<sup>th</sup>  March, 2018</h4>

          </div>
          <div class="col-md-5 hidden-xs">
            <img src="../../img/sif.svg" class="rocket animated bounce">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row me-row content-ct hidden-sm hidden-xs">
          <div class="col-md-6 col-sm-5" style="margin-top:1em;">
            <a href="index.php" class="btn btn-lg btn-red">Register<i class="fa fa-calendar" aria-hidden="true" style="padding-left:0.6em;"></i>
            </a>
          </div>
          <div class="col-md-5 col-sm-5" style="margin-top:1em;">
            <a href="check.php" class="btn btn-lg btn-yellow disabled">Check your status<i class="fa fa-binoculars" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div>
          <!--div class="col-md-3 col-md-offset-1" style="margin-top:1em;">
              <a href="https://www.facebook.com/aparoksha/" target="_blank" class="btn btn-lg btn-success">Event information<i class="fa fa-info-circle" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div-->
        </div>

        <div class="row me-row content-ct hidden-lg hidden-md">
          <div class="col-md-6 col-sm-5" style="margin-top:1em;">
            <a href="index.php" class="btn btn-md btn-red">Register<i class="fa fa-calendar" aria-hidden="true" style="padding-left:0.6em;"></i>
            </a>
          </div>
          <div class="col-md-5 col-sm-5" style="margin-top:1em;">
            <a href="check.php" class="btn btn-md btn-yellow disabled">Check your status<i class="fa fa-binoculars" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div>
          <!--div class="col-md-3 col-md-offset-1" style="margin-top:1em;">
              <a href="https://www.facebook.com/aparoksha/" target="_blank" class="btn btn-lg btn-success">Event information<i class="fa fa-info-circle" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div-->
        </div>

        <div class="col-md-12 contact-form">
            <h2 class="content-ct" style="font-weight:bold;"><span class="ti-email"></span> Register yourself here</h2>
            <h5 class="content-ct" style="font-weight:bold; margin-bottom:3em;"><span class="ti-email"></span>Fields marked with <sup>*</sup> are mandatory</h5>
            
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
                    <input type="tel" pattern="[0-9]{10}" class="form-control" id="mobile" data-error="Please enter a 10 digit mobile number" name="mobile" placeholder="xxxxxxxxxx" value="<?php if (isset($_SESSION['mobile'])){echo $_SESSION['mobile']; unset($_SESSION['mobile']);} ?>" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="course" class="col-sm-2 control-label">Course Name<sup>*</sup></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="course" name="course" placeholder="e.g. ECE (B.Tech)" value="<?php if (isset($_SESSION['course'])){echo $_SESSION['course']; unset($_SESSION['course']);} ?>" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="semester" class="col-sm-2 control-label">Semester<sup>*</sup></label>
                  <div class="col-sm-9">
                    <input type="text" pattern="[0-8]{1}" class="form-control" id="semester" data-error="Please enter a valid semester number" name="semester" placeholder="0-8" value="<?php if (isset($_SESSION['semester'])){echo $_SESSION['semester']; unset($_SESSION['semester']);} ?>" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="collegename" class="col-sm-2 control-label">College Name<sup>*</sup></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="collegename" name="collegename" placeholder="e.g. IIITA" value="<?php if (isset($_SESSION['collegename'])){echo $_SESSION['collegename']; unset($_SESSION['collegename']);} ?>" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="info" class="col-sm-2 control-label">Your Info</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="5" id="info" name="yourinfo" placeholder="Provide Info about yourself (optional)"><?php if (isset($_SESSION['yourinfo'])){echo $_SESSION['yourinfo']; unset($_SESSION['yourinfo']);} else{echo '';}?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Profiles Interested<sup>*</sup></label>
                  <div class="col-sm-10">
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="frontend" value="Frontend Developer" id="frontendcheck" <?php if (isset($_SESSION['frontend'])){echo "checked";} unset($_SESSION['frontend']);?>> Frontend Developer
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="backend" value="Backend Developer" id="backendcheck" <?php if (isset($_SESSION['backend'])){echo "checked";} unset($_SESSION['backend']);?>> Backend Developer
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="fullstack" value="Full-Stack Developer" id="fullstackcheck" <?php if (isset($_SESSION['fullstack'])){echo "checked";} unset($_SESSION['fullstack']);?>> Full-Stack Developer
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="graphics" value="Graphics" id="graphicscheck" <?php if (isset($_SESSION['graphics'])){echo "checked";} unset($_SESSION['graphics']);?>> Graphic Designer
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="content" value="Content Writing" id="contentcheck" <?php if (isset($_SESSION['content'])){echo "checked";} unset($_SESSION['content']);?>> Content Writing
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="business" value="Business" id="businesscheck" <?php if (isset($_SESSION['business'])){echo "checked";} unset($_SESSION['business']);?>> Business Development
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="marketing" value="Marketing" id="marketingcheck" <?php if (isset($_SESSION['marketing'])){echo "checked";} unset($_SESSION['marketing']);?>> Marketing
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="datascience" value="Data Science" id="datasciencecheck" <?php if (isset($_SESSION['datascience'])){echo "checked";} unset($_SESSION['datascience']);?>> Data Science
                      </label>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="company" class="col-sm-2 control-label">Resume Link<sup>*</sup></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="resume" name="resumelink" value="<?php if (isset($_SESSION['resumelink'])){echo $_SESSION['resumelink']; unset($_SESSION['resumelink']);} ?>" placeholder="Upload your resume on drive and share drive link" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <br> 
              <div class="form-group">
                <div class="col-sm-12" style="text-align:center; margin-top:1em;">
                  <button type="submit" id="submit" name="sub" class="btn btn-yellow">Submit<i class="fa fa-paper-plane" aria-hidden="true" style="padding-left:0.6em;"></i></button>
                </div>
              </div>
            </form>
          </div>
      </div>

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
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9458120350</p>
          </div>
          <div class="col-md-6 contact-form" style="text-align:right;">
            <h4> For SIF related information:</h3>
              <hr>
              <p> Abhishek Sharma </p>
              <p> sif@aparoksha.org </p>
              <!--p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9919241909</p-->
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

      <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/jquery.easing.min.js"></script>
      <script src="../../js/scrolling-nav.js"></script>
      <!-- <script src="../../js/validator.js"></script> -->
      <!-- <script src="../js/script.js"></script> -->
     
    </body>
    </html>