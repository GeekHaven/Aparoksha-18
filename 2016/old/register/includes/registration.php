<?php
	$user = $_SESSION['user'];
	$userid = getAccountid($user);
	$regval="";
	$registerscs="";
	$stuff="";
	$categorywise = "";
	$eventdetails = array();
	$categories = array();
	$events = array();
	$count = array();
	if (isset($_GET['eventid'])) {
		$eventdetails = getEventbyid(addslashes(htmlentities($_GET['eventid'])));
		if ($eventdetails && count($eventdetails)) {
			$eid = $_GET['eventid'];
		if ($eid == 23) {
			$stuff = "<div class='box'>
				<div class='box-head'>
                                                <h2 class='left'> ".$eventdetails[0]['event_name'].": </h2>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'><br>
                                                <h3><b><u>About: </u></b></h3><br>
                                                <p style='padding-bottom: 5px; font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['about'])."</p><br>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Rules:</u> </b></h3><br>
                                                <p style='padding-bottom: 5px;font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['rules'])."</p><br>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Problem Statement:</u></b> </h3><br>
						<p style='padding-bottom: 5px;font-size:14px; line-height:18px;'>". stripslashes($eventdetails[0]['clink']) ."</p><br>
                                        </div>  
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Contact Details:</u> </b></h3><br>
                                                <p style='padding-bottom: 5px; font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['contacts'])."</p><br>
                                        </div>  
	
			</div>
				";
			} else {
				$stuff = "<div class='box'>
				<div class='box-head'>
                                                <h2 class='left'> ".$eventdetails[0]['event_name'].": </h2>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'><br>
                                                <h3><b><u>About: </u></b></h3><br>
                                                <p style='padding-bottom: 5px; font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['about'])."</p><br>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Rules:</u> </b></h3><br>
                                                <p style='padding-bottom: 5px;font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['rules'])."</p><br>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Contest Link:</u></b> </h3><br>
						<p style='padding-bottom: 5px;font-size:14px; line-height:18px;'><a href='" . stripslashes($eventdetails[0]['clink']) . "' target='new'>". stripslashes($eventdetails[0]['clink']) ."</a></p><br>
                                        </div>  
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Contact Details:</u> </b></h3><br>
                                                <p style='padding-bottom: 5px; font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['contacts'])."</p><br>
                                        </div>  
	
			</div>
				";
			}
		}
	}
	if (isset($_POST['register'])) {
		$regval = addslashes(htmlentities($_POST['regval']));
		require_once(__DIR__."/../event/includes/includes_reg.php");
                    
		$reg = new REGISTER($dbh);
		
		if(!alreadyRegistered1($userid, ''.$regval)) {
			if(isProfileComplete($user)) {
				//registerEvent($regval, $userid, $user);
				$regval = ''.$regval;
				if($reg->addPart($regval, $userid)){
					$registerscs = "<p style='color:#74a446; font-size:15px;' > You have successfully registered to the Event! </p>";
				}else {
					$registerscs = "<p style='color:#74a446; font-size:15px;' > Sorry!! You COuldnote be registered</p>";
				}
			} else {
				$registerscs = "<p style='color:red; font-size:15px;' > First you need to complete your profile information to apply for Events.<p>";
			}
		} else {
			$registerscs = "<p style='color:#74a446; font-size:15px;' > You are already registered to the Event! </p>";
		}
		$eventdetails = getEventbyid($regval);
		$stuff = "<div class='box'>
				<div class='box-head'>
                                                <h2 class='left'> ".$eventdetails[0]['event_name'].": </h2>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'><br>
                                                <h3><b><u>About: </u></b></h3><br>
                                                <p style='padding-bottom: 5px; font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['about'])."</p><br>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Rules:</u> </b></h3><br>
                                                <p style='padding-bottom: 5px;font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['rules'])."</p><br>
                                        </div>
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Contest Link:</u></b> </h3><br>
						<p style='padding-bottom: 5px;font-size:14px; line-height:18px;'><a href='" . stripslashes($eventdetails[0]['clink']) . "' target='new'>". stripslashes($eventdetails[0]['clink']) ."</a></p><br>
                                        </div>  
                                        <div style='padding: 10px 10px 10px 20px;'>
                                                <h3><b><u>Contact Details:</u> </b></h3><br>
                                                <p style='padding-bottom: 5px; font-size:14px; line-height:18px;'>".stripslashes($eventdetails[0]['contacts'])."</p><br>
                                        </div>  
	
			</div>
				";
	}
?>

<!-- Container -->

    
    <div id="main" style="width:940px; margin:20px auto;">
      <div class="cl">&nbsp;</div>
      <?php echo "<span style='margin-left:20px;margin-top:5px;'>{$registerscs} </span>"; ?>
      <div id="content" >
		<?php echo $stuff; ?>
			  <?php
				$categories = getEventCategories();
				$events = getAllEvents();
				for ($i = 0; $i < count($categories); $i++) {
					$eventcat = $categories[$i]['id'];
					$count[$i] = 0;
					for ($j = 1; $j <= count($events); $j++) {
						if ($events[$j-1]['event_category_id'] == $eventcat) {
							$count[$i]++;
						}
					}
				}
				for ($i = 0; $i < count($categories); $i++) {
					$eventcat = $categories[$i]['id'];
					if ($count[$i]) {
						echo "<div class='box'>
								  <div class='box-head'>
									<h2 class='left'>".ucFirst($categories[$i]['name'])."</h2>
								  </div>
							 
								  <div class='table'>
									<table width='100%' border='0' cellspacing='0' cellpadding='0'>
									  <tr>
										<th width='' height='34'>Sl No.</th>
										<th width='' align='center'>Event</th>
										<th width='' align='center'>Start on</th>
										<th width='' align='center'>Ends on</th>
										<th width='' align='center'>Register</th>
									  </tr>
						";
						$k = 1;
						for ($j = 1; $j <= count($events); $j++) {
							if ($events[$j-1]['event_category_id'] == $eventcat) {
								echo"
									<form name='register-form' method='POST' action=''>
									  <tr>
										<td align='center'>{$k}. </td>
										<td align='center'><a href=?nav=registration&eventid={$events[$j-1]['id']}><h3>{$events[$j-1]['event_name']}</h3></a></td>
										<td align='center'>". format_date( $events[$j-1]['start']) ."</td>
										<td align='center'>" . format_date($events[$j-1]['end']) . "</td>
										<td style='font-size:14px; align=center;'>
										<input type='hidden' name='regval' value={$events[$j-1]['id']} />
								";
								$k++;
							}
							if ($events[$j-1]['event_category_id'] == $eventcat) {
								$timezone = "Asia/Calcutta";
								date_default_timezone_set($timezone);
								if (time() >= strtotime($events[$j-1]['end'])) {
									echo "<p>Registration Closed!</h4></td>";
								} else if (alreadyRegistered1($userid, ''.$events[$j-1]['id'])) {
									echo "<p align='center'>Registered</h4></td>";								
								} else {
									echo"
									<a href='#'><input type='submit' name='register' value='Register' class='md-close' style='margin:0px; align=center;'/></a></td>
								  </tr>
								  </form>
								  ";
								}
							}
						}
						echo "</table>
							</div>
							</div>";
					}
				}
				
			  ?>
       
      </div>
      
      </div>
      
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main -->
