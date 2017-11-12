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
       
       <li> <img src ="images/bg.png" height = "200" width = "200" margin-left="0">
                 </li>
        
        <li class="bold"><a href="play.php" class="waves-effect waves-grey">Play</a></li>
        <li class="bold"><a href="Leaderboard.php" class="waves-effect waves-grey">Leaderboard</a></li>
        
          
           
          
        </li>
        <li class="bold"><a href="rules.php" class="waves-effect waves-grey">Rules</a></li>
        <li class="bold"><a href="logout.php" class="waves-effect waves-grey">Logout</a></li>
      </ul>
    </header>
<div id = "snow"></div>
 <main><div class="container">
 
    <div id = "tables" class="section scrollspy">
 <div class="row"   >
 
  <table class="highlight"  align = "right">
        <thead>
          <tr>
               <th data-field="Rank">Rank</font>  </th>
              <th data-field="Rank"><font color="#eee">Rank</font>  </th>
              <th data-field="User_ID"><font color="#eee">User ID</font></th>
              <th data-field="Name"><font color = "#eee">Name</font></th>
              <th data-field="Score"><font color="#eee">Score</font></th>
    
          </tr>
        </thead>

        <tbody>
        <?php

$servername = "localhost";
$username = "aparokshadba";
$password = "@p@r0ksh@dba2015";
$dbname = "aparokshadb";
$conn = new mysqli($servername, $username, $password, $dbname);
$rank=1;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user_id,user_fname,user_lname,score FROM users ORDER BY score DESC, time;";
$result = $conn->query($sql);

 while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
  echo "<td>".$rank."</td>";
  echo "<td><font color='#eee'>".$rank."</font></td>";
  echo "<td><font color='#eee'>" ."HINT00". $row['user_id'] . "</font></td>";
  echo "<td><font color='#eee'>" . $row['user_fname']." ". $row['user_lname']. "</font></td>";
  echo "<td><font color='#eee'>" . $row['score'] . "</font></td>";
  echo "</tr>";
  $rank++;
 }

mysqli_close($conn);

        ?>

        </tbody>
      </table></div></div></div></div></div></div></main></div>
            

<div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<script src = "JS/1.js"> </script>
</body>
</html>
