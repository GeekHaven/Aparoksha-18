<?php
    require_once("head.php");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stegolica</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
	<style>
		body {
			background-size: 100%;
			background-image: url('img/bg.jpg');
			background-repeat: no-repeat;
		}
		
		table {
			color: #f2f1ef;
			font-size: 1.8em;
			background-color: #22313f;
		}
		
		th {
			text-align:center
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
	</style>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="overflow:hidden;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="padding:0px;background: linear-gradient(#0C0C0C, #16574B);
    box-shadow: #DADDE0 1px 1px 10px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Stegolica</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="leaderboard.php">Leaderboard</a>
                    </li>                   
                    <li class="page-scroll active">
                        <a href="#">Rules</a>
                    </li>
                    <li class="page-scroll">
                        <a href="contact.php">Contact</a>
                    </li>
                    <li class="page-scroll">
                        <a href="https://www.facebook.com/stegolica">Hint</a>
                    </li>
                    <?php if($_SESSION['log']) {
                 
                    echo '<li class="page-scroll"><a href="https://effervescence.iiita.ac.in/register/models/logout.php">Logout</a></li>';
                  }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<section>
		<div class="container">
            <div class="row">
				<ul style="font-size: 1.5em;font-weight: bold;padding-bottom:2%; color: #CAE8E7;background: linear-gradient(#0A0A0A 55%, rgba(21, 79, 69, 0.43));border-radius: 20px;padding-top: 2%;">
					<li>It will be an 6 hours event.</li>
					<li>Each question will have some data which contains some hidden information. The data maybe an image, a video, an audio or anything. You need to find the information from this to answer the question.</li>
					<li>	You can move the next question only after answering the present question.</li>
					<li>The one who completes all the questions the fastest will be the winner. And by fastest, I mean the average time of answering all the questions from the start of the event will be considered.</li>
					<li>In case of any discrepancies, the MOD’s decision will be final. Because here MOD is the GOD.</li>
				</ul>		
			</div>	
		</div>
	</section>		   
	<!-- jQuery -->
</body>
</html>
