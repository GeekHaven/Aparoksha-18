<?php
/*
Created by Saptak
*/

require_once 'core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {        
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if($validate->passed()) {
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login) {
                Redirect::to('index.php');
            } else {
                echo '<p>Incorrect username or password</p>';
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
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
      
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row">
        <form class="col s12 offset-s3" action="" method="POST">
          <h1>Login</h1>
          <div class="row">
            <div class="input-field col s6">
              <input type="text" name="username" id="username">
              <label for="Username">Username</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input type="password" name="password" id="password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember">
                </label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
                  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                  <input type="submit" class="waves-light waves-effect btn" value="Login">
              </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

