<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
else
{
	header("Location: play.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$active=$userRow['active'];
if($active==0)
{
		header("Location: verify.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>project</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<a id="home">
<div class="navbar-fixed">
</a>
  <nav class="#26a69a teal lighten-1" role="navigation">

    <div class="nav-wrapper container">
      <a id="logo-container" href="#home" class="brand-logo">Home</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#why_us">Why us</a></li>
        <li><a href = "#about_us">About Us</a></li>
	<li><a href = "#services">rules</a></li>
	<li><a href = "#contact">Contact Us</a></li>
	<li><a href = "play.php">quiz</a></li>
	<li><a href = "Leaderboard.php">leaderboard</a></li>
	<li><a href = "logout.php">Logout</a></li>
		

      </ul>

   


  
  <ul id="slide-out" class="side-nav">
     <li><a href="#why_us">Why us</a></li>
        <li><a href = "#about_us">About Us</a></li>
	<li><a href = "#services">rules</a></li>
	<li><a href = "#contact">Contact Us</a></li>
	<li><a href = "play.php">quiz</a></li>
	<li><a href = "Leaderboard.php">leaderboard</a></li>
	<li><a href = "logout.php">Logout</a></li>

  </ul>
  <a href="#home" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu" style="color:black;"></i></a>

      
    </div>

  </nav>
</div>

  <div id="index-banner" class="parallax-container">

    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 style="color:white;"  class="header center grey-text text-darken-4" font-weight=800 >successfully logged in</h1>
        <div class="row center">
          <h5 class="header col s12  black-text text-accent-3">test your knowledge</h5>
        </div>
        <div class="row center">
          <a href="#overview" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">some link here</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax" id="over"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
  </div>

<a name="overview">
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">trending_up</i></h2>
            <h5 class="center">some statement here</h5>

            <p class="light">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">perm_identity</i></h2>
            <h5 class="center">some statement here </h5>

            <p class="light">Osome statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">some statement here </h5>

            <p class="light">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here  </p>
          </div>
        </div>
      </div>

    </div>
  </div>

<a id="overview">
  <div class="parallax-container valign-wrapper">
</a>
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 -text">some statement here </h3>
	  <h6 class="header col s12 white-text ">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here <h6>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
  </div>
<a id="why_us">
  <div class="container">
</a>
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="material-icons"></i></h3>

          <h4>Why Us?</h4>
          <p class="left-align light"> some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here </p>
        </div>
      </div>

    </div>
  </div>
 <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 light">some statement here </h3>
	
	  <h2 class="header col s12 white-text">some statement here </h2>
	  <h6 class="header col s12 white-text">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here <h6>		
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 2"></div>
  </div>
<a id="about_us">
  <div class="container">
</a>
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="material-icons"></i></h3>
          <h4>About Us</h4>
          <p class="left-align light"> some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here 
</p>
	<p class="left-align light">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here </p>
	<p class="left-align light">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here </p>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
         <h2 class="header col s12 red-text text-darken-3">some statement here </h2>
	  <h6 class="header col s12 red-text text-darken-3">some statement here some statement here some statement here some statement here some statement here some statement here some statement here some statement here </h6>	
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background4.png" alt="Unsplashed background img 2"></div>
  </div>
<a id="services">
  <div class="container">
</a>
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="material-icons"></i></h3>
          <ul class="collection with-header">
        <li class="collection-header"><h4>some statement here </h4></li>
        <li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>

	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>
	<li class="collection-item">some statement here </li>

    </ul>
        </div>
      </div>

    </div>
  </div>


<a id="contact">
  <div class="parallax-container valign-wrapper">
</a>
    <div class="section no-pad-bot">

      <div class="container">

        <div class="row center">
          <h2 class="header col s12 white-text">Contact Us</h2>
	  <h5 class="header col s12 red-text text-darken-3">some statement here </h5>
<h5 class="header col s12 red-text">some statement here </h5>
<h5 class="header col s12 red-text">some statement here </h5>	
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background6.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Mailing Adress</h5>
          <p class="white-text" >some statement here some statement here some statement here some statement here </p>
<p class="white-text"> some statement here some statement here </p>
<p class="white-text">some statement here some statement here some statement here </p>
</div>
        

      </div>
    </div>
    
  </footer>


  <!--  Scripts-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
