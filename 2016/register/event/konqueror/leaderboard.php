<?php

	require_once("head.php");
    
    $rankList = $ranks->getRankList();
    //$instt = $rank->getInstitute();
    //echo '<br><br><br><br><br>';
    
    //-1 = No Submission/No rank
    //echo $rank->getMyRank();

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
			background-repeat: repeat-y;
		}
		
		table {
			color: #775B3C;
			font-size: 1.8em;			
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
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

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
                    <li class="page-scroll active">
                        <a href="#">Leaderboard</a>
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
            <div class="row"  style="text-align:center;">
				<table align="center" class="table-bordered">
					<tbody>
						<tr>
							<th width="20%">
								Rank
							</th>
							<th width="20%">
								Name
							</th>
							<th width="30%">
								Institute
							</th>
							<th width="20%">
								Score
							</th>
						</tr>
						<?php 
							foreach($rankList as $rank=>$ranker){
								$instt = $ranks->getInstitute($ranker);
								?>
								<tr>
									<td><?php echo $rank ?></td>
									<td><?php echo $ranker ?></td>
									<td><?php echo $instt ?></td>
									<td><?php if($level->getscore($ranker) != -2)
													echo $level->getscore($ranker); 
									?></td>
								</tr>
							<?php } ?>
					</tbody>			
				</table>		
			</div>	
		</div>
	</section>		   
	<!-- jQuery -->
</body>
</html>>