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

    <title>Konqueror</title>

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

<body id="page-top" class="index" >

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
                <a class="navbar-brand" href="index.php">Konqueror</a>
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
                        <a href="https://www.facebook.com/konqeror">Hint</a>
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
				<ul style="font-size: 1.5em;font-weight: bold;color: #775B3C;">
					<li>	The duration is of 18 hours. </li>
					<li>Registration is mandatory. </li>
					<li>Each correct answer takes you to the next level. </li>
					<li>There is no negative marking so "Keep Guessing". </li>					
					<li>Any participant found indulging in unfair means will be disqualified immediately. The final discretion lies with the organisers.</li>
					<li>All answers will be in lowercase.</li>
					<li>If an answer consists of multiple words, write the answer without spaces between the words. For example, if an answer is “the lord of the rings”, then the answer will be written as “thelordoftherings”.</li>
					<li>If an answer contains numbers, each number has to be written separately. For example, if an answer is “786”, it will have to be written as “seveneightsix”.</li>
					<li>In case of a site having different forms as per nation, the Indian version would be considered. </li>
					<li>Hints will be provided time to time on our Facebook page.</li>
				</ul>		
			</div>	
		</div>
	</section>		   
	<!-- jQuery -->
</body>
</html>