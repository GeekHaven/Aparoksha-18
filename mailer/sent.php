<?php 

    session_start();

    if(!(isset($_SESSION['user']))){  
        header("location: index.php"); 
        exit;
    }

    //Load composer's autoloader
    require '../register/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(__DIR__);
    if (file_exists('.env')) {
        $dotenv->load('.env');
    }
            
    $servername = getenv('DB_HOST');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASS');
    $dbname = getenv('DB_NAME');
    $tbname = getenv('TB_NAME');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare('SELECT * FROM $tbname');
    	$stmt->execute();
        $entries = $stmt->fetchAll();

    }
    	
    catch(PDOException $e){
        echo '<script language="javascript">';
        echo '$sql . "<br>" . $e->getMessage();';
        echo '</script>';     
  		header("Refresh: 1; url=index.php");
    }

    $conn = null;
?>

<html>

<head>
    <title> Sent mails </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"/>
</head>

<body>

<div class="container">
  <h2>Mails Sent</h2>
  <br><br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Date Time</th>
        <th>Name</th>
        <th>Email</th>
        <th>Sent</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
      </tr>
    </thead>
    <tbody>
        <?php
            foreach($entries as $entry) {
                echo '<tr>';
                echo '<td>'.$entry['dated'].'</td>';
                echo '<td>'.$entry['company_email'].'</td>';
                echo '<td>'.$entry['company_name'].'</td>';
                echo '<td>'.$entry['mailed'].'</td>';
                echo '<td>'.$entry['sender_name'].'</td>';
                echo '<td>'.$entry['sender_mobile'].'</td>';
                echo '</td>';
            }
        ?>
    </tbody>
  </table>
</div>


<footer class="footer">
      <div class="container">
        <b><p class="text-muted" style="float: left;">&copy; Aparoksha 2018</p></b>
        <b><p class="text-muted" style="float: right; padding-right: 10px;">Credits: Shreyansh Dwivedi & Pradeep Gangwar </p></b>        
      </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>