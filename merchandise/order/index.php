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
  <title>Aparoksha Merchandise orders</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='../../css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="../../humblefoolcup/register/css/bootstrap-datetimepicker.min.css" />

</head>

<body id="page-top" data-spy="scroll" data-target=".side-menu">
      <a href="../../" style="text-decoration: none;color: black;"><i class="fa fa-arrow-left" aria-hidden="true" style="color: black; font-size: 25px;padding-left: 1%;padding-top: 1%;padding-bottom: 1%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 20px;font-weight: 400;">BACK</b></a>
      <div class="container-fluid">
        <div class="row hero-header" id="home">
          <div class="col-md-12">
          <a href="https://aparoksha.org"><img src="../../img/apk-logo.png" id="apk-logo" class="logo img-circle img responsive"></a>
            <h1>Aparoksha'18| Merchandise Orders</h1>
            <h3> Annual Technical fest of IIITA</h3>
            <h4>16<sup>th</sup> to 18<sup>th</sup>  March, 2018</h4>
          </div>
          <!-- <div class="col-md-5">
            <img src="../../img/frag.png" class="rocket animated bounce">
          </div> -->
        </div>
      </div>

      <div class="container">

        <div class="row me-row">
          <h3> Samples (Click to zoom) </h3>
          <div class="col-md-12" style="margin-top:1em;">
            <img src="../../img/t_both.jpg" class="img-responsive" style="height:400px;" id="myImg">
          </div>
          <!-- <div class="col-md-6" style="margin-top:1em;">
             <img src="../../img/t1-back.jpg" class="img-responsive" style="height:400px;" id="myImg1">
          </div> -->
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
          <img class="modal-content" id="img01">
        </div>

        <div class="row me-row content-ct">
          <div class="col-md-12" style="margin-top:1em;">
            <button class="btn btn-lg btn-success btn-disabled" onclick="return false;">Payment To<i class="fa fa-angle-double-down" aria-hidden="true" style="padding-left:0.6em;"></i>
            </button>
          </div>
        </div>

        <div class="row me-row content-ct">
          <div class="col-md-4" style="margin-top:1em;">
            <img src="../../img/paytm.jpg" class="img-responsive" style="height:400px;" id="">
            <h3> Paytm </h3>
          </div>
          <div class="col-md-4" style="margin-top:1em;">
            <img src="../../img/phonepe.jpg" class="img-responsive" style="height:400px;" id="">
            <h3> PhonePE </h3>
          </div>
          <div class="col-md-4" style="margin-top:1em;">
            <img src="../../img/tez.jpg" class="img-responsive" style="height:400px;" id="">
            <h3> Tez </h3>
          </div>
        </div>

        <h3>Price Chart</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Quantity</th>
              <th>Price (in Rs.)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Type A (Digital Renaissance)</td>
              <td><i class="fa fa-rupee" aria-hidden="true" style="padding-right:0.6em;"></i>300/-</td>
            </tr>
            <tr>
              <td>Type B (UFO)</td>
              <td><i class="fa fa-rupee" aria-hidden="true" style="padding-right:0.6em;"></i>300/-</td>
            </tr>
            <tr>
              <td>Combo (Type A + Type B) Same size</td>
              <td><i class="fa fa-rupee" aria-hidden="true" style="padding-right:0.6em;"></i>550/-</td>
            </tr>
          </tbody>
        </table>

        <hr style="border-width:4px;">

        <div class="row me-row content-ct">
          <div class="col-md-12" style="margin-top:1em;">
            <a href="check.php" class="btn btn-lg btn-yellow">Check your status<i class="fa fa-binoculars" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div>
        </div>

        <div class="col-md-12 contact-form">
            <h2 class="content-ct" style="font-weight:bold; margin-bottom:1em;"><span class="ti-email"></span> Order Here</h2>
            
            <div class="alert alert-info col-sm-12" id="info" style="margin-bottom:1em; 
            <?php if(isset($_SESSION['confirm'])){echo("display:block;");} else {echo("display:none;");} ?> ">
              <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
            </div>

            <form class="form-horizontal" data-toggle="validator" action="submit.php" role="form" method="post" name="f">
              <!-- <div class="form-group">
                <label for="uname" class="col-sm-2 control-label">Name<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="Your Name" value="" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div> -->
              <div class="form-group">
                <label for="uemail" class="col-sm-2 control-label">Email<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Your Email (We will send a email to this)" value="" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="college" class="col-sm-2 control-label">College<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="college" name="college" required>
                    <option value="IIITA">IIITA</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="hostel" class="col-sm-2 control-label">Hostel Number<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="hostel" name="hostel" required>
                    <option value="BH1">BH1</option>
                    <option value="BH2">BH2</option>
                    <option value="BH3">BH3</option>
                    <option value="BH4">BH4</option>
                    <option value="BH5">BH5</option>
                    <option value="GH1">GH1</option>
                    <option value="GH2">GH2</option>
                    <option value="GH3">GH3</option>
                    <option value="Not Applicable">Not Applicable</option>
                    <option value="Research Scholar Apts">Research Scholar Apts</option>
                  </select>
                </div>
              </div> -->
              <!-- <div class="form-group">
                <label for="room" class="col-sm-2 control-label">Room No.<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="room" name="room" placeholder="Room No." value="" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div> -->
              <div class="form-group">
                <label for="mobile" class="col-sm-2 control-label">Mobile<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="tel" pattern="[0-9]{10}" class="form-control" id="mobile" name="mobile" placeholder="xxxxxxxx" value="" data-error="Please enter a 10 digit mobile number" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="ttype" class="col-sm-2 control-label">T-Shirt Type<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="ttype" name="ttype">
                    <option value="A">Type A (Digital Renaissance)</option>
                    <option value="B">Type B (UFO)</option>
                    <option value="Combo">Combo (Type A + Type B)</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label">Quantity<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="quantity" name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="tsize" class="col-sm-2 control-label">T-Shirt Size<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="tsize" name="tsize">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Amount Paid<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount in Rs." value="" required readonly="readonly">
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="tranid" class="col-sm-2 control-label">Transaction ID<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="tranid" name="tranid" placeholder="Transaction ID here" value="" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <!-- <div class="form-group" id="datetime">
                  <label for="paidon" class="col-sm-2 control-label">Paid On<sup>*</sup></label>
                  <div class="col-sm-9">
                    <div class='input-group date' id='datetimepicker1'>
                      <input id="paidon" type='text' name="paidon" class="form-control"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                    <div class="help-block with-errors pull-right"></div>
                    <span class="form-control-feedback" aria-hidden="true"></span>
                  </div>
              </div> -->
              <div class="form-group">
                <label for="tranvia" class="col-sm-2 control-label">Paid Via<sup>*</sup></label>
                <div class="col-sm-9">
                  <select class="form-control" id="tranvia" name="tranvia">
                    <option value="PhonePe">PhonePE</option>
                    <option value="Paytm">Paytm</option>
                    <option value="Tez">Tez</option>
                  </select>
                </div>
              </div>
                
              <div class="text-center" style="margin-top=2em;">
                <h6> Make sure you have paid amount specified in amount field. </h6>
              </div>  
              <div class="form-group">
                <div class="col-sm-12" style="text-align:center; margin-top:1em;">
                  <button type="submit" id="submit" name="sub" class="btn btn-yellow">Submit<i class="fa fa-paper-plane" aria-hidden="true" style="padding-left:0.6em;"></i></button>
                </div>
              </div>
            </form>
          </div>

          <div class="row me-row">
          <div class="col-md-12 text-left" style="margin-top:1em;">
              <h2 class="text-center" class="margin-bottom:2em;"> Instructions: </h2>
              <ul>
                <li style="list-style-type: disc;"> Make payment to QR code given via <b>TEZ</b>, <b>PhonePe</b> or <b>Paytm</b> UPI services only. </li>
                <li style="list-style-type: disc;"> For faster review of your payment do not forget to mention your <b>Email ID</b> and other poosible details with the transaction message </li>
                <li style="list-style-type: disc;"> Once your payment is confirmed note your transaction number and keep it with you. </li>
                <li style="list-style-type: disc;"> Fill merchandise form and mention your <b>transaction ID</b> and and <b>Payment method</b>. </li>
                <li style="list-style-type: disc;"> When you are done just wait and once your payment is confirmed you can view the same on check you status page </li>
                <li style="list-style-type: disc;"> If you face any problems feel free to ask any person mentioned below. </li>
              </ul>
          </div>
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
            <h4> For merchandise issues:</h3>
              <hr>
              <p>Somendra Agrawal</p>
              <p> finance@aparoksha.org </p>
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9664087084</p>
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
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="script1.js"></script>
      <script src="../../js/jquery.easing.min.js"></script>
      <script src="../../js/scrolling-nav.js"></script>
      <script src="../../js/validator.js"></script>
      <script type="text/javascript" src="../../humblefoolcup/register/js/moment.min.js"></script>
      <script type="text/javascript" src="../../humblefoolcup/register/js/bootstrap-datetimepicker.min.js"></script>
     
    </body>
    </html>