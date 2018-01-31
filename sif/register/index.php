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
            <h2 class="content-ct" style="font-weight:bold;"><span class="ti-email"></span> Register your startup here</h2>
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
                  <label for="company" class="col-sm-2 control-label">Company Name<sup>*</sup></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="company" name="companyname" placeholder="" value="<?php if (isset($_SESSION['companyname'])){echo $_SESSION['companyname']; unset($_SESSION['companyname']);} ?>" required>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="info" class="col-sm-2 control-label">Company Info</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="5" id="info" name="companyinfo" placeholder="Provide Info about your startup (optional)"><?php if (isset($_SESSION['companyinfo'])){echo $_SESSION['companyinfo']; unset($_SESSION['companyinfo']);} else{echo '';}?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Profiles Hiring<sup>*</sup></label>
                  <div class="col-sm-10">
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="profiles[]" value="Frontend Developer" id="frontendcheck" <?php if (isset($_SESSION['frontend'])){echo "checked";} unset($_SESSION['frontend']);?>> Frontend Developer
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="profiles[]" value="Backend Developer" id="backendcheck" <?php if (isset($_SESSION['backend'])){echo "checked";} unset($_SESSION['backend']);?>> Backend Developer
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="profiles[]" value="Full-Stack Developer" id="fullstackcheck" <?php if (isset($_SESSION['fullstack'])){echo "checked";} unset($_SESSION['fullstack']);?>> Full-Stack Developer
                      </label>
                    </div>
                    <div class="checkbox col-sm-3">
                      <label>
                        <input type="checkbox" name="profiles[]" value="Graphics" id="graphicscheck" <?php if (isset($_SESSION['graphics'])){echo "checked";} unset($_SESSION['graphics']);?>> Graphic Designer
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="profiles[]" value="Content Writing" id="contentcheck" <?php if (isset($_SESSION['content'])){echo "checked";} unset($_SESSION['content']);?>> Content Writing
                      </label>
                    </div>
                    <div class="checkbox col-sm-4">
                      <label>
                        <input type="checkbox" name="profiles[]" value="Business" id="businesscheck" <?php if (isset($_SESSION['business'])){echo "checked";} unset($_SESSION['business']);?>> Business Development
                      </label>
                    </div>
                  </div>
              </div>
              <br>
              <h6 class="content-ct" style="font-weight:bold; margin-bottom:2em;"><span class="ti-email"></span>No of profiles required</h6>
              <div class="row">
                <div class="form-group col-sm-10 col-md-6" id="frontendfield">
                    <label for="frontend" class="col-sm-2 col-md-6 control-label">Frontend Developer</label>
                    <div class="col-sm-3 col-md-5">
                      <input type="number" class="form-control" id="frontend" name="frontend" placeholder="0" max="15" value="<?php if (isset($_SESSION['frontend'])){echo $_SESSION['frontend']; unset($_SESSION['frontend']);} else {echo 0;}?>" disabled="true">
                      <div class="help-block with-errors pull-right" id="frontenderror"></div>
                      <span class="form-control-feedback" aria-hidden="true" id="frontendspan"></span>
                    </div>
                </div>
                <div class="form-group col-sm-10 col-md-6" id="backendfield">
                    <label for="backend" class="col-sm-2 col-md-6 control-label">Backend Developer</label>
                    <div class="col-sm-3 col-md-5">
                      <input type="number" class="form-control" id="backend" name="backend" placeholder="0" max="15" value="<?php if (isset($_SESSION['backend'])){echo $_SESSION['backend']; unset($_SESSION['backend']);} else {echo 0;}?>" disabled="true">
                      <div class="help-block with-errors pull-right"></div>
                      <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-10 col-md-6" id="fullstackfield">
                    <label for="fullstack" class="col-sm-2 col-md-6 control-label">Full Stack Developer</label>
                    <div class="col-sm-3 col-md-5">
                      <input type="number" class="form-control" id="fullstack" name="fullstack" placeholder="0" max="15" value="<?php if (isset($_SESSION['fullstack'])){echo $_SESSION['fullstack']; unset($_SESSION['fullstack']);} else {echo 0;}?>" disabled="true">
                      <div class="help-block with-errors pull-right"></div>
                      <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group col-sm-10 col-md-6" id="graphicsfield">
                    <label for="graphics" class="col-sm-2 col-md-6 control-label">Graphic Designer</label>
                    <div class="col-sm-3 col-md-5">
                      <input type="number" class="form-control" id="graphics" name="graphics" placeholder="0" max="15" value="<?php if (isset($_SESSION['graphics'])){echo $_SESSION['graphics']; unset($_SESSION['graphics']);} else {echo 0;}?>" disabled="true">
                      <div class="help-block with-errors pull-right"></div>
                      <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-10 col-md-6" id="contentfield">
                    <label for="content" class="col-sm-2 col-md-6 control-label">Content Writing</label>
                    <div class="col-sm-3 col-md-5">
                      <input type="number" class="form-control" id="content" name="content" placeholder="0" max="15" value="<?php if (isset($_SESSION['content'])){echo $_SESSION['content']; unset($_SESSION['content']);} else {echo 0;}?>" disabled="true">
                      <div class="help-block with-errors pull-right"></div>
                      <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group col-sm-10 col-md-6" id="businessfield">
                    <label for="business" class="col-sm-2 col-md-6 control-label">Business Development</label>
                    <div class="col-sm-3 col-md-5">
                      <input type="number" class="form-control" id="business" name="business" placeholder="0" max="15" value="<?php if (isset($_SESSION['business'])){echo $_SESSION['business']; unset($_SESSION['business']);} else {echo 0;}?>" disabled="true">
                      <div class="help-block with-errors pull-right"></div>
                      <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="stipend" class="col-sm-2 control-label">Stipend</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="stipend" name="stipend" placeholder="Stipend in Rs" value="<?php if (isset($_SESSION['stipend'])){echo $_SESSION['stipend']; unset($_SESSION['stipend']);} ?>" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="restrict" class="col-sm-2 control-label">Restriction on branch</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="restrict" name="restrict" placeholder="CSE, EE" value="<?php if (isset($_SESSION['restrict'])){echo $_SESSION['restrict']; unset($_SESSION['restrict']);} ?>">
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="year" class="col-sm-2 control-label">Preferred graduation year</label>
                <div class="col-sm-9">
                  <input type="year" class="form-control" id="year" name="year" placeholder="2017, 2016" value="<?php if (isset($_SESSION['year'])){echo $_SESSION['year']; unset($_SESSION['year']);} ?>">
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group" style="text-align: center; padding-top: 2em;">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="checkbox col-sm-12 col-md-12 com-lg-12">
                      <label>
                        <input type="checkbox" name="terms" value="terms" id="terms">I accept all terms and conditions related to my registration to Startup and intern fair.
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

      <div class="container-fluid footer">
        <div class="col-sm-12" style="text-align:center; margin-top:1em; margin-bottom:0.5em;">
          <h2>Contact info: </h2>
        </div>
        <div class="row contact">
          <div class="col-md-6 contact-form">
            <h4> For website issues:</h3>
              <hr>
              <p> Web Operations Team </p>
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9458120350</p>
          </div>
          <div class="col-md-6 contact-form" style="text-align:right;">
            <h4> For SIF related information:</h3>
              <hr>
              <p> Abhishek Sharma </p>
              <p> events@aparoksha.org </p>
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
      <script src="../../js/validator.js"></script>
      <script src="../js/script.js"></script>
     
    </body>
    </html>