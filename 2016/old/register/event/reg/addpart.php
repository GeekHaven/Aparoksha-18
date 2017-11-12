<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table>
                <tr>
                    <th colspan=2>Register</th>
                </tr>
                <tr>
                    <td colspan=2>		
        <?php
        if (isset($_POST['submit'])) {
                extract($_POST);
                
                if(isset($_POST['uid']) && isset($_POST['event'])
                   && $_POST['uid'] && $_POST['event']) {
                    require_once("../includes/includes_reg.php");
                    
                    $reg = new REGISTER($dbh);
                    if($reg->addPart($event, $uid)) {
                        echo "Added";
                    } else {
                        echo "Error";
                    }
                } else {
                    echo "Fill data correctly";
                }
            } else {
                $uid = $pwd = $event = "";
            }
        ?>
                    </td>
                </tr>
                <tr>
                    <td>Event:</td>
                    <td><input type="text" name="event" value=""></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="uid" value=""></td>
                </tr>
                <tr>
                    <td colspan=2><input name="submit" type="submit" value="ADD"></td>
                </tr>
            </table>
        </form>
    </body>
</html>