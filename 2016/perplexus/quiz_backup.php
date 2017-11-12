<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$active=$userRow['active'];
if($active==0)
{
		header("Location: verify.php");
}

?>

<html>
 <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>

 <nav class="grey" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">HINT </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php">Home</a></li>
        <li><a href = "Leaderboard.php">Leaderboard</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
         <li><a href="home.php">Home</a></li>
        <li><a href = "Leaderboard.php">Leaderboard</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav><br>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">

        <li class="tab col s3 "><a  class = "active" href="#test1">01</a></li>
        <li class="tab col s3"><a  href="#test2">02</a></li>
        <li class="tab col s3 "><a href="#test3">03</a></li>
        <li class="tab col s3"><a href="#test4">04</a></li>
            <li class="tab col s3"><a href="#test1">05</a></li>
        <li class="tab col s3"><a  href="#test2">06</a></li>
        <li class="tab col s3 "><a href="#test3">07</a></li>
        <li class="tab col s3"><a href="#test4">08</a></li>
            <li class="tab col s3"><a href="#test1">09</a></li>
        <li class="tab col s3"><a  href="#test2">10</a></li>
        <li class="tab col s3 "><a href="#test3">11</a></li>
        <li class="tab col s3"><a href="#test4">12</a></li>
            <li class="tab col s3"><a href="#test1">13</a></li>
        <li class="tab col s3"><a  href="#test2">14</a></li>
        <li class="tab col s3 "><a href="#test3">15</a></li>
        <li class="tab col s3"><a href="#test4">16</a></li>
            <li class="tab col s3"><a href="#test1">17</a></li>
        <li class="tab col s3"><a  href="#test2">18</a></li>
        <li class="tab col s3 "><a href="#test3">19</a></li>
        <li class="tab col s3"><a href="#test4">20</a></li>
            <li class="tab col s3"><a href="#test1">21</a></li>
        <li class="tab col s3"><a  href="#test2">22</a></li>
        <li class="tab col s3 "><a href="#test3">23</a></li>
        <li class="tab col s3"><a href="#test4">24</a></li>
            <li class="tab col s3"><a href="#test1">25</a></li>
        <li class="tab col s3"><a  href="#test2">26</a></li>
        <li class="tab col s3 "><a href="#test3">27</a></li>
        <li class="tab col s3"><a href="#test4">28</a></li>
            <li class="tab col s3"><a href="#test1">29</a></li>
        <li class="tab col s3"><a href="#test2">30</a></li>
         
        


      </ul>
    </div>
    <div id="test1" class="col s12"><br>
        <img class="materialboxed" width="650" height="400"  src="images/sample-1.jpg"><br>
         <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter text" id="answer" type="text" class="validate">
          <label for="answer">Answer</label>
        </div>

       <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
      </div>
    </form>
  </div>




    </div>
    <div id="test2" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="question.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Test 4</div>
  </div>
        

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<script src = "JS/1.js"> </script>
</body>
</html>



