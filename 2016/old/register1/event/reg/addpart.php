
        
            	
        <?php
        if (isset($_POST['username'])) {
                extract($_POST);
                
                if(isset($_POST['username']) && isset($_POST['event'])
                   && $_POST['username'] && $_POST['event']) {
                    require_once(__DIR__."/../includes/includes_reg.php");
					$event = $_POST['event'];
					$uid = $_POST['username'];
					//echo $uid;
					$uid = getAccountid($uid);
                    $reg = new REGISTER($dbh);
                    if($reg->addPart($event, $uid)) {
                        $response["success"] = 1;
					$response["message"] = "Registered!";
					die(json_encode($response));
                    } else {
                        $response["success"] = 0;
					$response["message"] = "Error occured!";
					die(json_encode($response));
                    }
                } else {
                    $response["success"] = 0;
					$response["message"] = "Error occured!";
					die(json_encode($response));
                }
            } else {
                $uid = $pwd = $event = "";
            
        ?>
                   <form action="?page=add" method="post">
				   <input type="text" name="event" value=""></td>
                <input type="text" name="username" value="">
				<input name="submit" type="submit" value="ADD">
				</form><?php } ?>