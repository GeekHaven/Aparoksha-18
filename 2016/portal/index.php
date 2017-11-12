<?php
/*
Created by Saptak
*/

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Aparoksha Registration</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body style="overflow:hidden;">
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Aparoksha Registration</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="newTicket.php">New Ticket</a></li>
        <li><a href="listTicket.php">List of Tickets Generated</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="newTicket.php">New Ticket</a></li>
        <li><a href="listTicket.php">List of Tickets Generated</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <h1>Hello, <?php echo escape($user->data()->username); ?>. Welcome to Registration Portal</h1>
      </div>
    </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script type="text/javascript">
     $(document).ready(function() {
      $('select').material_select();
    });
  </script>
  </body>
</html>

<?php
} else {
    Redirect::to('login.php');
}