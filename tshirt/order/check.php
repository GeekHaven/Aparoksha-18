<?php

  session_start();
  require '../../register/vendor/autoload.php';
  $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
       $dotenv->load('.env');
    }

    $dbhost = getenv('DB_HOST');
    $dbuser = getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbn = getenv('DB_NAME');
    $tbn = getenv('TB_NAME');

    $servername = $dbhost;
    $username = $dbuser;
    $password = $dbpass;
    $dbname = $dbn;
    $tbname = $tbn;

    if(isset($_GET['orderid']))
    {
      $orderno = $_GET['orderid'];

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM $tbname WHERE order_no = :order_no");
        $stmt->execute(['order_no' => $orderno]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if($order != null){
            $_SESSION['confirm'] = "Your order details are shown below"; 
            $verified = $order['verified'];
            $name = $order['name'];
            $ttype = $order['t_type'];
            $tsize = $order['t_size'];
            $quantity = $order['t_quantity'];
            $tranid = $order['trans_id'];
            $amount = $order['amount_paid'];
        }
              
        else{
            $_SESSION['confirm'] = "There is no order with this order ID. Check order ID with the email sent to you regarding your order ";
        }
            
      }
    
      catch(PDOException $e){
        $_SESSION['confirm'] = "Oops! looks like we have ran into some trouble with your order. Please
        try again after some time. If problem persists please feel free to contact any person mentioned below ";
        header("Refresh: 0; url=index.php#info");
        exit;
      }
      $clicked = false;
      $conn = null;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aparoksha 2018 registrations are open. Dates are 16th- 18th March 2018. Exciting events">
  <meta name="author" content="Aproksha 2018">
  <title>Aparoksha Merchandise| Check Your Status</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='../../css/dosis-font.css' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">

</head>

<body id="page-top" data-spy="scroll" data-target=".side-menu">
    <a href="../../" style="text-decoration: none;color: black;"><i class="fa fa-arrow-left" aria-hidden="true" style="color: black; font-size: 25px;padding-left: 1%;padding-top: 1%;padding-bottom: 1%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 20px;font-weight: 400;">BACK</b></a>
      <div class="container-fluid">
        <div class="row hero-header" id="home">
          <div class="col-md-12">
          <a href="https://aparoksha.org"><img src="../../img/apk-logo.png" id="apk-logo" class="logo img-circle img responsive"></a>
            <h1>Aparoksha'18| Merchandise Orders</h1>
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
          <div class="col-md-6" style="margin-top:1em;">
            <a href="index.php" class="btn btn-lg btn-red">Order<i class="fa fa-calendar" aria-hidden="true" style="padding-left:0.6em;"></i>
            </a>
          </div>
          <div class="col-md-6" style="margin-top:1em;">
            <a href="#" class="btn btn-lg btn-yellow">Check your status<i class="fa fa-binoculars" aria-hidden="true" style="padding-left:0.6em;"></i></a>
          </div>
        </div>

        <div class="col-md-12 contact-form">
            <h2 class="content-ct" style="font-weight:bold; margin-bottom:1em;"><span class="ti-email"></span> Check Your order payment status</h2>
            
            <div class="alert alert-info col-sm-12" id="info" style="margin-bottom:1em; 
            <?php if(isset($_SESSION['confirm'])){echo("display:block;");} else {echo("display:none;");} ?> ">
              <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
            </div>

            <form class="form-horizontal" data-toggle="validator" role="form" method="get" name="f">
              <div class="form-group">
                <label for="order" class="col-sm-2 control-label">Order ID<sup>*</sup></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="order" name="orderid" placeholder="Order ID as given in mail sent to you" required>
                  <div class="help-block with-errors pull-right"></div>
                  <span class="form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
                
              <div class="form-group">
                <div class="col-sm-12" style="text-align:center; margin-top:1em;">
                  <button type="submit" id="submit" class="btn btn-yellow">Submit<i class="fa fa-paper-plane" aria-hidden="true" style="padding-left:0.6em;"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>

 <div class="container-fluid" style="<?php if(isset($_GET['orderid']) && $order!=null ){echo("display:block;");} else {echo("display:none;");} ?>">
    <table class="table table-sm " style="width:80%; margin-left:auto; margin-right:auto;">
        <tbody>
            <tr>
                <th scope="row" align="center">Name</th>
                <td align="center"><?php echo $name; ?></td>
            </tr>
            <tr>
                <th scope="row" align="center">T-Shirt Type</th>
                <td align="center"><?php echo $ttype; ?></td>
            </tr>
            <tr>
                <th scope="row" align="center">T-Shirt Size</th>
                <td align="center"><?php echo $tsize; ?></td>
            </tr>
            <tr>
                <th scope="row" align="center">T-Shirt Quantity</th>
                <td align="center"><?php echo $quantity; ?></td>
            </tr>
            <tr>
                <th scope="row" align="center">Transaction ID</th>
                <td align="center"><?php echo $tranid; ?></td>
            </tr>
            <tr>
                <th scope="row" align="center">Amount Paid</th>
                <td align="center"><?php echo $amount; ?></td>
            </tr>
            <tr>
                <th scope="row" align="center">Verified</th>
                <td align="center"><?php if($verified === "true") {echo "Yes";} else {echo "No";} ?></td>
            </tr>
        </tbody>
    </table>
  </div>
    
      <div class="container-fluid footer">
        <div class="col-sm-12" style="text-align:center; margin-top:1em; margin-bottom:0.5em;">
          <h2>Contact info: </h2>
        </div>
        <div class="row contact">
          <div class="col-md-6 contact-form">
            <h4> For website issues:</h4>
              <hr>
              <p> Pradeep Gangwar </p>
              <p> pradeepgangwar39@gmail.com </p>
              <p><i class="fa fa-phone" aria-hidden="true" style="padding-right:5px;"></i>+91-9458120350</p>
          </div>
          <div class="col-md-6 contact-form" style="text-align:right;">
            <h4> For merchandise issues:</h4>
              <hr>
              <p> Sai Rakshit </p>
              <p> finance@aparoksha.org </p>
          </div>
        </div>
        <div class="row footer-credit">
          <div class="col-md-6 col-sm-6">
            <p>&copy; 2018, <a href="http://aparoksha.org">Aparoksha</a></p>
          </div>
          <div class="col-md-6 col-sm-6"> 
            <ul class="footer-menu">
              <li><a href="https://www.facebook.com/aparoksha/" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com/aparoksha_org" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true" style="padding-left:0.6em;"></i></a></li>
              <li><a href="https://www.instagram.com/aparokshaiiita/" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true" style="padding-left:0.6em;"></i></a></li>
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