
<html>
<head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
         <link type="text/css" rel="stylesheet" href="css/general.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>
<header>
      
     <ul id="nav-mobile" class="side-nav fixed">
       
       <li> <img src ="images/bg.jpg" height = "200" width = "400" margin-left="0">
                 </li>
        
        <li class="bold"><a href="about.html" class="waves-effect waves-grey">Play</a></li>
        <li class="bold"><a href="Leaderboard.php" class="waves-effect waves-grey">Leaderboard</a></li>
        
          
           
          
        </li>
        <li class="bold"><a href="Rules.php" class="waves-effect waves-grey">Rules</a></li>
        <li class="bold"><a href="Logout.php" class="waves-effect waves-grey">Logout</a></li>
      </ul>
    </header>
    <div id ="snow">
    </div>
    <div class="container">
    <div class="row">
  <div id="test1" class="col s12 m9"><br>
	
  

        <img id = "mainimg" class="materialboxed initialized" height="400" width="650" src="images/sample-1.jpg" ><br>
	       
	<div class="row">
    <form method="post" class="col s12 ">
      <div class="row">
        <div class="input-field  col  s12 m6" id = "mainfield">
          <input placeholder="Enter text" id="q1_ans" name="q1_ans" type="text" class="validate">
          <label for="q1_ans">Answer</label>
        </div>
 <button class="btn waves-effect waves-light btn-large black" type="submit" name="q1_submit" id ="mainbutton" ><i class="material-icons right">send</i>
  </button>
  </div>
    </form>
  </div></div>
  </div>
