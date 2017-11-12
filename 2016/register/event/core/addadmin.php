<?php
$valid_passwords = array ("core" => "deadly");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}
?>
<html>
    <head>
        <title>Add Admin</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table>
                <tr>
                    <th colspan=2>Add Admin to Event</th>
                </tr>
                <tr>
                    <td colspan=2>		
        <?php
            if (isset($_POST['submit'])) {
                extract($_POST);
                
                if(isset($_POST['pwd']) && isset($_POST['event'])
                   && $_POST['pwd'] && $_POST['event']) {
                    require_once("../includes/includes_core.php");
                    
                    $core = new CORE($dbh);
                    if ($core->addAdmin($event, $pwd)) echo "Added";
                    else  echo "Error";
                } else {
                    echo "Fill data correctly";
                }
            } else {
                $pwd = $event = "";
            }
        ?>
                    </td>
                </tr>
                <tr>
                    <td>Event:</td>
                    <td><input type="text" name="event" value=""></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="pwd" value=""></td>
                </tr>
                <tr>
                    <td colspan=2><input name="submit" type="submit" value="ADD"></td>
                </tr>
            </table>
        </form>
    </body>
</html>