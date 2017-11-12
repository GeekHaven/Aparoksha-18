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

        <li class="tab col s3 "><a   class = "active" href="#test1">01</a></li>
        <li class="tab col s3"><a href="#test2">02</a></li>
        <li class="tab col s3 "><a href="#test3">03</a></li>
        <li class="tab col s3"><a href="#test4">04</a></li>
            <li class="tab col s3"><a href="#test5">05</a></li>
        <li class="tab col s3"><a  href="#test6">06</a></li>
        <li class="tab col s3 "><a href="#test7">07</a></li>
        <li class="tab col s3"><a href="#test8">08</a></li>
            <li class="tab col s3"><a href="#test9>09</a></li>
        <li class="tab col s3"><a  href="#test10">10</a></li>
        <li class="tab col s3 "><a href="#test11">11</a></li>
        <li class="tab col s3"><a href="#test12">12</a></li>
            <li class="tab col s3"><a href="#test13">13</a></li>
        <li class="tab col s3"><a  href="#test14">14</a></li>
        <li class="tab col s3 "><a href="#test15">15</a></li>
        <li class="tab col s3"><a href="#test16">16</a></li>
            <li class="tab col s3"><a href="#test17">17</a></li>
        <li class="tab col s3"><a  href="#test18">18</a></li>
        <li class="tab col s3 "><a href="#test19">19</a></li>
        <li class="tab col s3"><a href="#test20">20</a></li>
            <li class="tab col s3"><a href="#test21">21</a></li>
        <li class="tab col s3"><a  href="#test22">22</a></li>
        <li class="tab col s3 "><a href="#test23">23</a></li>
        <li class="tab col s3"><a href="#test24">24</a></li>
            <li class="tab col s3"><a href="#test25">25</a></li>
        <li class="tab col s3"><a  href="#test26">26</a></li>
        <li class="tab col s3 "><a href="#test27">27</a></li>
        <li class="tab col s3"><a href="#test28">28</a></li>
            <li class="tab col s3"><a href="#test29">29</a></li>
        <li class="tab col s3"><a href="#test30">30</a></li>
         
        


      </ul>
</div>

   <div id="test1" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q1ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
    <div id="test2" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q2ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
   <div id="test3" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q3ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
    <div id="test4" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q4ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test5" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q5ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test6" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q6ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test7" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q7ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test8" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q8ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test9" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q9ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test10" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q10ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test11" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q11ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test12" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q12ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test13" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q13ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test14" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q14ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test15" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q15ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test16" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q16ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test17" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q17ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test18" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q18ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test19" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q19ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test20" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q20ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test21" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q21ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test22" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q22ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test23" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q23ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test24" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q24ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test25" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q25ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test26" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q26ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test27" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q27ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test28" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q28ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test29" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q29ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>
<div id="test30" class="col s12"><iframe width="100%" height="100%" id="iframe_id" name="iframe_name" src="ques/q30ns.php" scrolling="yes" frameborder="0" ALLOWTRANSPARENCY="true" onload=resize_iframe();></iframe>
</div>


  </div>
</div>
</div>
        

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<script src = "JS/1.js"> </script>
</body>
</html>


