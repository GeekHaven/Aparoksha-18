<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Team Info</title>
	<!--Stylesheets-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css"/>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Team Info</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <h3 class="text-center"> Enter details</h3>
  <br>

  <div class="alert alert-info col-sm-12" id="info" style="margin-bottom:1em; 
  <?php if(isset($_SESSION['confirm'])){echo("display:block;");} else {echo("display:none;");} ?> ">
  <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
 </div>

 <form class="form-horizontal" method="POST" action="submit.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">handle</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" placeholder="handle" name="handle" required>
    </div>
  </div>
  <div class="form-group">
    <label for="position" class="col-sm-2 control-label">Position<sup>*</sup></label>
      <div class="col-sm-8">
        <select class="form-control" id="position" name="position">
          <option value="Member">Member</option>
          <option value="Head">Head</option>
        </select>
      </div>
  </div>
  <div class="form-group">
    <label for="department" class="col-sm-2 control-label">Deartment name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="department" placeholder="department (type exact name with capital letters whereever necessary)" name="dept" required>
    </div>
  </div>
  <div class="form-group">
    <label for="info" class="col-sm-2 control-label">About You</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="5" id="info" name="info" placeholder="Provide Info about you"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="facebook" class="col-sm-2 control-label">Facebook (Optional)</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="facebook" placeholder="facebook id url" name="facebook">
    </div>
  </div>
  <div class="form-group">
    <label for="github" class="col-sm-2 control-label">Github (Optional)</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="github" placeholder="github profile link" name="github">
    </div>
  </div>
  <div class="form-group">
    <label for="twitter" class="col-sm-2 control-label">Twitter (Optional)</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="twitter" placeholder="twitter profile link" name="twitter">
    </div>
  </div>
  
  <div class="form-group text-center" style="margin-left: 12%;">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit1">Submit</button>
    </div>
  </div>
</form>

<br>
<!-- Scripts -->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>