<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Perplexus| Aparoksha'18</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">



    <style>
        body {
            background: url("images/bgdark.jpg")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        header, main, footer {
  padding-left: 440px;
}

@media only screen and (max-width : 992px) {
  header, main, footer {
    padding-left: 0;
  }
}
.dark-skin .navbar {
    background-color:transparent;
}
tr{
  color:white;

}
tr img{
}

    </style>


</head>

<body class="fixed-sn dark-skin">

    <header>

        
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

           
            <div class="breadcrumb-dn" style="margin-left: 10px;">
                <a href="index.php"><h5>PERPLEXUS</h5></a>
            </div>
            <div class="breadcrumb-dn" style="margin-left: 20px;">
                <a href="https://www.facebook.com/events/1992044107749486/?active_tab=discussion" target="_blank"><h5 style="color:red;">HINTS AND GIVEAWAYS ARE BEING POSTED HERE.</h5></a>
            </div>


            <ul class="nav navbar-nav pull-right">
                 <div class="breadcrumb-dn">
                <p>Aparoksha'18 | Perplexus </p>
            </div>
                </ul>
        </nav>
      

    </header>

    <main>
          <table class="table table-hover">
        <thead>
          <tr>
              <th data-field="Rank">RANK</th>
            
              <th data-field="Name">NAME</th>
              <th data-field="Score">SCORE</th>
    
          </tr>
        </thead>

        <tbody class = "table-hover">
        <?php


        //database configuration
        $dbServer = "localhost"; //Define database server host
        $dbUsername = "root"; //Define database username
        $dbPassword = ""; //Define database password
        $dbName = "perplexus"; //Define database name

        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("SELECT * FROM users ORDER BY score DESC, qtime");
		$stmt->execute();

$rank=1;

$rows =  $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach( $rows as $row)
 {
 echo "<tr>";
  echo "<td>".$rank."</td>";
  //$temp=$row['picture'];
  echo "<td>" .$row['fname']." ". $row['lname']. "</td>"; //"<img src = '".$row['picture']."'>". 
  echo "<td>" . $row['score'] . "</td>";
  echo "</tr>";
  $rank++;
 }

 $conn = null;

        ?>

        </tbody>
      </table>

    </main>

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <script type="text/javascript" src="js/tether.min.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
        $(".button-collapse").sideNav();

        var el = document.querySelector('.custom-scrollbar');

        Ps.initialize(el);
    </script>


</body>

</html>