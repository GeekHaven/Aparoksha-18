<?php 
  session_start();

    if(isset($_SESSION['username'])){
        define('MyConst', TRUE);
    }

    if(!defined('MyConst')){
        echo '<script language="javascript">';
        echo 'alert("Access Denied")';
        echo '</script>';   
        header("Refresh: 1; url=../index.php");
        exit();
    }
    $user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aparoksha 2018 registrations are open. Dates are 16th- 18th March 2018. Exciting events">
  <meta name="author" content="Aproksha 2018">
  <title>HumblefoolCup Registrations | Aparoksha'18</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
  <link href='../../css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">

</head>

<body id="page-top" data-spy="scroll" data-target=".side-menu">
      <div class="container-fluid">
        <div class="row hero-header" id="home">
          <div class="col-md-12 col-xs-12 col-sm-12">
            <a href="https://aparoksha.org" class="col-md-4 col-md-offset-2"><img src="../../img/apk-logo-white.svg" id="" style="width:9em; height:10em; margin: 0 auto;" class="logo img-responsive text-center"></a>
            <a href="https://www.topcoder.com" class="col-md-4"><img src="../../img/TopcoderLogo.png" style="width:20em; height:10em;" id="" class="img-responsive" id=""></a>
          </div>
          <div class="col-md-12">
            <h4>Presents</h4>
            <h1>HumblefoolCup 2018</h1>
            <h5>in memeory of</h5>
            <h2><a href="../tribute/"> Harsha Suryanarayana [@humblefool]</a> </h2>
          </div>
          <!-- <div class="col-md-5">
            <img src="../../img/frag.png" class="rocket animated bounce">
          </div> -->
        </div>
      </div>

      <div class="container">

        <div class="col-md-12 contact-form">
            <h2 class="content-ct" style="margin-bottom:0em;"><span class="ti-email"></span>Welcome <b><?php echo $user ?></b></h2>
            <div class="form-group">
                <div class="col-sm-12" style="text-align:center; margin-top:0.5em; margin-bottom:1em;">
                  <a href="logout.php"><button id="logout" name="logout" class="btn btn-red">Logout</button></a>
                </div>
            </div>
            <h5 class="content-ct" style="margin-bottom:0.5em; margin-top:2em;"><span class="ti-email"></span> Congrats! on being selected for OnSite round. Please fill this form so that we can serve you best </h5>
            <h5 class="content-ct" style="margin-bottom:2em;"><span class="ti-email"></span> Fields marked with <sup>*</sup> are compulsory </h5>
            
            <div class="alert alert-info col-sm-12" id="info" style="margin-bottom:1em; 
            <?php if(isset($_SESSION['confirm'])){echo("display:block;");} else {echo("display:none;");} ?> ">
              <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
            </div>

            <form class="form-horizontal" data-toggle="validator" action="submit.php" role="form" method="post" enctype="multipart/form-data" name="f">
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
                  <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter a valid e-mail. All emails will be sent to this mail." value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email']; unset($_SESSION['email']);} ?>" required>
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
                  <label for="collegeid" class="col-sm-2 control-label">College ID (in .png, .jpg, .jpeg and less than 1 MB only)<sup>*</sup></label>
                  <div class="col-sm-9 input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                    <span class="input-group-btn">
                      <!-- image-preview-clear button -->
                      <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                      </button>
                      <!-- image-preview-input -->
                      <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                      </div>
                    </span>
                  </div>
              </div>
              <div class="form-group" id="shirt">
                <label for="tshirt" class="col-sm-2 control-label">T-Shirt Size<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="tshirt" name="tshirt">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                </div>
              </div> 
              <div class="form-group" id="attending">
                  <label for="attend" class="col-sm-2 control-label">Are you attending onsite round?<sup>*</sup></label>
                  <div class="col-sm-9">
                    <label class="radio-inline"><input type="radio" id="attend_yes" name="attend" value="yes" checked="checked">Yes</label>
                    <label class="radio-inline"><input type="radio" id="attend_no" name="attend" value="no">No</label>                    <div class="help-block with-errors pull-right" id="topcoder-error">
                    </div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div>
              <div class="form-group" id="datetime">
                  <label for="date" class="col-sm-2 control-label">Date and time of arrival at IIITA<sup>*</sup></label>
                  <div class="col-sm-9">
                    <div class='input-group date' id='datetimepicker1'>
                      <input id="date" type='text' name="date" class="form-control"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
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
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9458120350</p>
          </div>
          <div class="col-md-6 contact-form" style="text-align:right;">
            <h4> For event related information:</h3>
              <hr>
              <p>Hariom Niranjan</p>
              <p> events@aparoksha.org </p>
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9981250963</p>
          </div>
        </div>
        <div class="row footer-credit">
          <div class="col-md-6 col-sm-6">
            <p>&copy; 2018, <a href="https://aparoksha.org">Aparoksha</a></p>
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
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="js/script.js"></script>
      <script src="../../js/scrolling-nav.js"></script>
      <script type="text/javascript" src="js/moment.min.js"></script>
      <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
      <script src="../../js/validator.js"></script>
     
    </body>
    </html>