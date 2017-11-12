<?php
/*
Created by Saptak
*/

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current
$events = new Events();

if($user->isLoggedIn()) {
	if (Input::exists()) {
    	if(Token::check(Input::get('token'))) {
    		try {
                $events->create(array(
                    'username' => Input::get('username'),
                    'added_by' => $user->data()->username,
                    'event_id' => Input::get('event'),
                    'quantity' => Input::get('quantity')
                ));

                require_once('includes/ticket.php');
                die();
            } catch(Exception $e) {
                echo $error, '<br>';
            }
        }
    }
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
        <form class="col s12 offset-s3" action="" method="POST">
          <h1>Form</h1>
          <div class="row">
            <div class="input-field col s6">
              <input type="text" name="username" id="username">
              <label for="username">Name</label>
            </div>
          </div>          
          <div class="row">
            <div class="input-field col s6">
              <select name="event" id="event">
                <option value="" disabled selected>Choose event</option>
                <?php
                    foreach ($events->findAll() as $key => $value) {
                        echo "<option value='".$value->id."'>".$value->name."</option>";
                    }
                ?>
              </select>
              <label>Select Event</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type="number" name="quantity" id="quantity">
              <label for="quantity">Quantity</label>
            </div>
          </div>
          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
          <input type="submit" class="waves-light waves-effect btn" value="Create Ticket">
          
        </form>
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