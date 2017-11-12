<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="pragma" content="no-cache"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="keywords" content="aparoksha, space hurdle, flappy bird, gamemaker" />
	<meta name="description" content="An online desktop adaptation of flappy bird with a sci fi touch." />
	<meta name="author" content="Amritesh Singh" />
        <meta name ="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta charset="utf-8"/>

	<link type="text/css" rel="stylesheet" href="../register/css/materialize.min.css"  media="screen,projection"/>

        <!-- Set the title bar of the page -->
        <title>Space Hurdle</title>

        <!-- Set the background colour of the document -->
        <style>
            body {
              background: #222;
              color:#cccccc;
              margin: 0px;
              padding: 0px;
              border: 0px;
	      overflow-y: hidden;
            }
            canvas {
                      image-rendering: optimizeSpeed;
                      -webkit-interpolation-mode: nearest-neighbor;
                      margin: 0px;
                      padding: 0px;
                      border: 0px;
            }
            :-webkit-full-screen #canvas {
                 width: 100%;
                 height: 100%;
            }
            div.gm4html5_div_class
            {
              margin: 0px;
              padding: 0px;
              border: 0px;
            }
            /* START - Login Dialog Box */
            div.gm4html5_login
            {
                 padding: 20px;
                 position: absolute;
                 border: solid 2px #000000;
                 background-color: #404040;
                 color:#00ff00;
                 border-radius: 15px;
                 box-shadow: #101010 20px 20px 40px;
            }
            div.gm4html5_cancel_button
            {
                 float: right;
            }
            div.gm4html5_login_button
            {
                 float: left;
            }
            div.gm4html5_login_header
            {
                 text-align: center;
            }
            /* END - Login Dialog Box */
            :-webkit-full-screen {
               width: 100%;
               height: 100%;
            }
        </style>
    </head>

    <body>
	<nav style="position:fixed; background: rgba(52, 111, 141, 0.2);">
	  <img src="f1.png" style="position: absolute; width: 5%;">
	  <div class="nav-wrapper" style="font-color:blue; a:hover{color:black}" >
	     <ul class="right hide-on-med-and-down">
	      <li><a href="../index.html" >Aparoksha</a></li>		
	      <li><a href="leaderboard.php">Leaderboard</a></li>
	    </ul>
	  </div>
	</nav>
        <div class="gm4html5_div_class" id="gm4html5_div_id">
            <!-- Create the canvas element the game draws to -->
            <canvas id="canvas" width="1276" height="680">
               <p>Your browser doesn't support HTML5 canvas.</p>
            </canvas>
        </div>

        <!-- Run the game code -->
        <script type="text/javascript" src="html5game/flappy bird.js?OGBBC=12181601"></script>
    </body>
</html>
