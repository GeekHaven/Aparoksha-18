<?php
$valid_passwords = array ("infinitum" => "1nf1n1tum");
$valid_users = array_keys($valid_passwords);

$event = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($event, $valid_users)) && ($pass == $valid_passwords[$event]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="EVENT password"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}  
?>
<html>
    <head>
        <title>Add ANS</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table align="left">
                <tr>
                    <th colspan=2>Add que to Event</th>
                </tr>
                <tr>
                    <td colspan=2>		
        <?php
        if (isset($_POST['details'])) {
                extract($_POST);
                
                if(isset($_POST['qid']) && isset($_POST['question'])
                   && $_POST['question'] && $_POST['qid']) {
                    require_once("../../includes/includes_admin.php");
                    
                    $adm = new ADMIN('4', $dbh);
                    //echo $qid."   ".$question;
                    $qid = $adm->cleanString($qid);
                    $qid = $adm->encrypt($qid);
                    
                    $question = $adm->cleanString($question);
                    $question = $adm->encrypt($question);
                     //echo $qid."   ".$question;
                    
                    $query = "INSERT INTO `" . constant('4') . "_que`(`qid`, `question`) VALUES (:qid, :question)";
                    
                    $stmt = $dbh->prepare($query);
                    $stmt->bindParam(':qid', $qid, PDO::PARAM_STR);
                    $stmt->bindParam(':question', $question, PDO::PARAM_STR);
                    
                    
                    if($stmt->execute()) {
                        echo "added";
                    } else {
                        print_r($stmt->errorInfo());
                        echo "error";
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
                    <td>QID:</td>
                    <td><input type="text" name="qid" value=""></td>
                </tr>
                <tr>
                    <td>Question:</td>
                    <td><input type="text" name="question" value=""></td>
                </tr>
               
                <tr>
                    <td colspan=2><input name="details" type="submit" value="ADD DETAILS"></td>
                </tr>
            </table>
        </form>
        
        
        
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table align="right">
                <tr>
                    <th colspan=2>Add Ans to Event</th>
                </tr>
                <tr>
                    <td colspan=2>		
        <?php
        if (isset($_POST['submit'])) {
                extract($_POST);
                
                if(isset($_POST['ans']) && isset($_POST['level'])
                   && $_POST['ans'] && $_POST['level']) {
                    require_once("../../includes/includes_admin.php");
                    
                    $reg = new ADMIN('4', $dbh);
                    if($reg->addANS($level, $ans)) {
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
                    <td>QID:</td>
                    <td><input type="text" name="level" value=""></td>
                </tr>
                <tr>
                    <td>Ans(all in small without spaces):</td>
                    <td><input type="text" name="ans" value=""></td>
                </tr>
                <tr>
                    <td colspan=2><input name="submit" type="submit" value="ADD ANS"></td>
                </tr>
            </table>
        </form>
    </body>
</html>