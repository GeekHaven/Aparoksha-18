<?php session_start(); ?>

<!DOCTYPE html>
<html>
<?php include ('header.php');
?>
<head>
<!-- Site Properities -->
  <title>Ideaboard </title>
</head>
<body id="home">


 
  
  
  
  <div class="ui grid">
  <div class="five wide column"></div>
  <div class="six wide column">
  <div class="container "> 
  <h1>Member Login</h1>

  <form class="ui fluid form segment" action="logincheck.php" method="POST">
      
      <div class="field">
        <label>Username</label>
        <input placeholder="Username" type="text" name="user"/>
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="pass"/>
      </div>
	  
      <input class="ui blue submit button" type="submit" value="Login"/>
    </form>   
</div></div></div>



   <?php  include('footer.php'); ?>
</body>

</html>
