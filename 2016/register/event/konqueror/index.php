<?php
    require_once("head.php");
    
    
    //echo $level->getLevel();
    //echo '<br><br><br><br><br>';
    $wrong="";
	$fl = 0;
    

    if(isset($_POST['ans'])) {
     	$check = $level->submit($_POST['ans']);
     }

    if($check == -1){
    	$wrong = "Wrong Answer!! Try Again";
    }

     //Associative array of que details $arr['key']
    $arr = $level->getQueDetails();
    if(!$arr == null) {
        //print_r($arr);
        $img = $DIR.$arr['img'].".jpg";
        $qno = $arr['qid'];
		$fl = 1;
    }
    /*else
    	echo "Nothing found";*/

    //echo '<br><br><br><br><br>';

    $myrank = $ranks->getMyRank();
    
    // 1 = correct submission
    // -1 = incorrect ans
    // -2 = correct ans but not submitted(error)
    //echo $level->submit('2');
    //echo '<br><br><br><br><br>';
    
    //Updated level, So no need to refresh page
    //echo $level->getLevel();
    //echo '<br><br><br><br><br>';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Konqueror</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
	<style>
		body {
			background-size: 100% 100%;
			background-repeat: no-repeat;
		}

		form {
			margin: 0 auto;
			width: 90%;
		}
		.navbar-default {
			background-color: rgba(165, 112, 58, 0.88);
		}
		
		.form-control {
			color: black;
		}
		.form-control::-webkit-input-placeholder { /* WebKit, Blink, Edge */
			color:    #34495e;
		}
		.form-control:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
		   color:    #34495e;
		   opacity:  1;
		}
		.form-control::-moz-placeholder { /* Mozilla Firefox 19+ */
		   color:    #34495e;
		   opacity:  1;
		}
		.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
		   color:    #34495e;
		}
		input {
			text-align:center;
		}
	</style>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="background-image: url('img/bg.jpg');overflow:hidden;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="padding:0px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand active" href="#">Konqueror</a>
            </div>
			  <span style = "position:relative;left:10%;color:#fff;" role="presentation" ><?php 
			  if ($login->isEventEnded())
				die("<h1>Event Ended</h1>");
			    
			   /// echo '<br><br><br><br><br>';
			    
			    //Time Check for start
			    else if ($login->isEventStarted() && !$login->isEventEnded()){
			    	
					
					//echo $login->time_left();
				    //echo $login->isParticipant();
				    if($login->isLogin()) {
				    	
				    	$islogin = 1;
				        if($login->isParticipant()){
				        	//echo "Level : ".$level->getLevel()."||";
				        	if($myrank != -1){
				        		//echo "Rank : ".$myrank;
				        	}
				           $isvalid = 1;
				        } else {
				       		$isvalid = 0;	
				        }
				    }
				} else {die("<h1>Event Yet to be Started</h1>");}?></span>
			
			  <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="leaderboard.php">Leaderboard</a>
                    </li>					
                    <li class="page-scroll">
                        <a href="rules.php">Rules</a>
                    </li>
                    <li class="page-scroll">
                        <a href="contact.php">Contact</a>
                    </li>
                    <li class="page-scroll">
                        <a href="https://www.facebook.com/konqeror">Hints</a>
                    </li>
                    <?php if($islogin && $isvalid) {
						$_SESSION['log'] = 1;
					  	echo '<li class="page-scroll"><a href="https://effervescence.iiita.ac.in/register/models/logout.php">Logout</a></li>';
					  }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            </div>
	        <!-- /.container-fluid -->
	    </nav>
		<section id="contact" style="padding-top:61px;font-size:12px;">
        	<div class="container"><div class="row"  style="text-align:center;">
                <div class="col-lg-12">
                	<?php if($islogin && $isvalid) { 
								if($fl) {?>
							<center><h3 style = "padding-top: 0px;">Question - <?php echo $qno ?></h3></center>
                    <div class="row">
                        <img src="<?php echo $img;?>" style="width:41.5%;"/>
                    </div>
					<form name="form-control" method="POST" action="index.php">						
						<div class="row control-group">
                            <div class="form-group col-lg-12 floating-label-form-group controls">
                                <label>Enter your answer</label>
                                <input type="text" name="ans" class="form-control" placeholder="enter your answer" id="cpwd" required data-validation-required-message="Please enter your answer">
							</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" style="line-height: 0.65;">Submit</button>
                            </div>
                        </div>
                        <?php if(isset($wrong)) {
							echo '<span color="red">'.$wrong.'</span>';
						}?>
                    </form>
                    <?php } else {
									echo "Congrats!! You have completed!!!";
							}
							
						}else if(!$islogin){
							echo '<span style="text-align:center;">You must login to start the quiz.<br><br><form action="https://effervescence.iiita.ac.in/register/?page=login" method="POST"><input type="hidden" name="q" value="1"/><input type="submit"  value="Login"  class="btn btn-default"></form></span>';
						} else {
							echo'<span style="text-align:center;>You are not participating. To participate please register<br><br><a href="https://effervescence.iiita.ac.in/register/?page=register"><div class="btn btn-default">Register</div></a></span>';
							}?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>