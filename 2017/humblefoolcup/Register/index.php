<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Aparoksha)Humblefool cup</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <!-- multistep form -->
  <h1 id = "success"> You have completed the registeration succesfully</h1>
<form method="post" id="msform" action ="">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Some personal Details</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="firstname" placeholder="Your First Name" required/>
    <input type="text" name="lastname" placeholder="Your Last Name" required/>
    <input type="email" name="email" placeholder="Your email" required />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">More info</h2>
    <h3 class="fs-subtitle">Your college details</h3>
    <input type="text" name="cname" placeholder="College name" required/>
    <input type="text" name="cid" placeholder="Enrollment no./college ID" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Topcoder</h2>
    <h3 class="fs-subtitle">Link your topcoder account</h3>
    <input type="text" name="tid" placeholder="TopCoder username" required/>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="submit" />
  </fieldset>
</form>
<img src = "abhi.png" id = "bottom">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script src="js/index.js"></script>
    <script type="text/javascript">$('#success').hide();</script>


 <?php
if(isset($_POST['submit'])){

$hostname='localhost';
$username='gymkhanadba';
$password='gympass123';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=gymkhana",$username,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO topcoder
VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$_POST["cname"]."','".$_POST["cid"]."','".$_POST["tid"]."')";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>$('#msform').hide();$('#success').show();</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}
 }
?>
</body>
</html> 
