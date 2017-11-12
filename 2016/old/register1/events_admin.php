<?php
session_start();
ob_start();
require_once("config/config.php");

require_once("models/database.php");
require_once("models/session.php");

require_once("api/contentFunctions.php");
require_once("api/sessionFunctions.php");
require_once('api/mailFunctions.php');
require_once("business/Database_handler.class.php");
require_once("business/Link.class.php");
//require_once("business/Error_handler.class.php");
require_once('business/Logger.class.php');
require_once('business/recaptcha.php');
require_once('business/ContentSanitize.class.php');

$publickey = "6LeBe-gSAAAAAA-Hq1oEgFlTNluEsysgL9lb5Hx-";
 
require_once('includes/html_head.php'); 
	$san = new Sanitize();

//	ErrorHandler::SetHandler();
	$uid="";
	$msg="";
	$logout="";
	$addscs="";
	$editscs="";
	$dltdscs="";
	$evntid="";
	$edtevnt="";
	$evntcat="";
	$newsmsg="";
	$newsdelmsg="";
	if (isset($_POST['login']) && !isAdminLogin()) {
		$uid = addslashes(htmlentities($_POST['username']));
		$pwd = addslashes(htmlentities($_POST['password']));
		if (adminauthenticate($uid, $pwd)) {
			$_SESSION['admin'] = $uid;
			$_SESSION['loginAdminIdentifier'] = 1;
		} else {
			$msg = "Incorrect Login Id or Password !";
		}
	}
	if (isset($_POST['logout']) && isAdminLogin()) {
		$_SESSION = array();
        if(isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
		$logout = "You have been Successfully Logged Out!"; 
	}
	if (isset($_POST['addevent'])) {
		$event_name = addslashes(htmlentities($_POST['eventname']));
		$event_category_id = $_POST['eventcat'];
		$added_by = $_SESSION['admin'];
		addEvent($event_name, $event_category_id, $added_by);
		$addscs = "Event has been successfully added to the database !";
	}
	if (isset($_POST['selectevent'])) {
		$evntid=$_POST['eventname'];
		$edtevnt=getEventbyid($evntid);
	}
	if (isset($_POST['editevent'])) {
		$modified_by = $_SESSION['admin'];
		$eventname = (htmlentities($_POST['eventname']));
		$event_category_id = (htmlentities($_POST['eventcat']));
		$about = $san -> cleanHTML($_POST['about']);
		$rules = $san -> cleanHTML($_POST['rules']);
		$contacts = $san -> cleanHTML($_POST['contacts']);
		$evntid = $san -> cleanHTML($_POST['evntid']);
		$clink = $san -> cleanHTML($_POST['clink']);
		$strtdate = date('Y-m-d H:i:s',strtotime(addslashes(htmlentities($_POST['strtdate'])).' '.addslashes(htmlentities($_POST['strttime']))));
		$enddate = date('Y-m-d H:i:s',strtotime($_POST['enddate'].' '.$_POST['endtime']));
		editEvent($evntid, $eventname, $event_category_id, $about, $rules, $contacts, $clink, $strtdate, $enddate, $modified_by);
		$editscs = "Event has been successfully updated in the database !";
	}
	if (isset($_POST['deleteevent'])) {
		$evntid=$_POST['eventname'];
		$modified_by = $_SESSION['admin'];
		deleteevent($evntid, $modified_by);
		$dltdscs = "Event has been successfully deleted !";
	}
	
	if (isset($_POST['addnews'])) {
		$content = $_POST['content'];
		$heading = $_POST['heading'];
		$link = $_POST['link'];
		$added_by = $_SESSION['admin'];
		$eventid = $_POST['event_id_news'];
		if ($heading && $content) {	
			addNews($content, $heading, $link, $eventid, $added_by);
			$newsmsg = "News has been successfully added to the database!";
		} else {
			$newsmsg = "Content and Heading both fields are required!";
		}
	}
	
	if (isset($_POST['deletenews'])) {
		deleteNews($_POST['news_heading'], $_SESSION['admin']);
		$newsdelmsg = "News has been deleted!";
	}
		
	
		//footer
flush();
ob_flush();
ob_end_clean();
?>
	<script type ="text/javascript" src="css/jquery.js"></script>
	<script type="text/javascript" src="css/jquery.jdpicker.js"></script>
	<link rel="stylesheet" href="css/jdpicker.css" type="text/css" media="all" />
	<script type="text/javascript">
        $(document).ready(function () {
            $('#strtdate1').jdPicker();
        });
    </script>
	<body style='background-image:url('images/')'>
<!-- Header -->
<div id='header'>
  <div class='shell'>
    <!-- Logo + Top Nav -->
    <div id='top'>
      <h1><a href='http://aparoksha.iiita.ac.in'>Aparoksha</a></h1>
	   <?php if (isAdminLogin()) {
		echo "<div id='top-navigation'> 
				<form id='logout' method='POST' action=''><div align='right'>Welcome<strong> ".$_SESSION['admin']." | <button class='md-close1' type='submit' name='logout'>LogOut</button></form></div>
			  </div>";
			}
		?>
	</div>
  </div>
</div>
<?php 
	if (!isAdminLogin()) {
	echo "<div id='form_wrapper' class='form_wrapper' style='margin-left:35%; margin-top:5%;'>
	<form class = 'login active' id='login' action='' method='POST'>
		<div>
		<table>
	    <tr>
			<tr><td>Username:</td><td><input type='text' name='username' value=".$uid."></td></tr><tr><td>Password:</td><td><input type='password' name='password' value=''/></td></tr>
			<tr><td>&nbsp;</td><td><input type='submit' name='login' value='Login'/></td>
		</tr>
		</table>
		</div>
	</form>";
	echo "<h4 style='margin-left:20px;margin-top:5px;	 padding:3px; color: rgb(216,71,71); line-height:20px;'>{$msg} </h4>" ;	
	echo "<h4 style='margin-left:20px;margin-top:5px;	 padding:3px;color:#ffa800; line-height:20px;'>{$logout} </h4></div>";
	
	} else {
		echo"
		<h4 style='margin-left:20px;margin-top:5px;'>{$addscs} </h4>
		<h4 style='margin-left:20px;margin-top:5px;'>{$editscs} </h4>
		<h4 style='margin-left:20px;margin-top:5px;'>{$dltdscs} </h4>
		<div class='box' style='width:780px; margin:20px auto;'>
		<div class='table'>
		<form role ='form' id='add_event' method='POST' action=''>
			<label>Event Name: </label><input type='text' name='eventname'/>
			<label>Event Category: </label>
				<select name='eventcat' >
					<option value='0'>Select event category: </option>";
					 $events = getEventCategories(); 
						for($i = 0; $i < count($events); $i++) {
							$evname = $events[$i]['name'];
							$id = $events[$i]['id'];
							echo "<option value='$id'>".ucFirst($evname)."</option>";
						}
				echo "
				</select>
			<input type='submit' name='addevent' value='Add Event'/><br>
		</form>
		</div>
		</div>
		
		<div class='box' style='width:780px; margin:20px auto;'>
		<div class='table'>
		<form role ='form' id='select_event' method='POST' action=''>
			<select name='eventname' >
				<option value='0'>Select event to edit: </option>";
				$events = getAllEvents(); 
				for($i = 0; $i < count($events); $i++) {
					$evname = $events[$i]['event_name'];
					$id = $events[$i]['id'];
					echo "<option value='$id' "; if ($evntid == $id) echo "selected"; echo ">".ucFirst($evname)."</option>";
				}
				echo "
				</select>
			<input type='submit' name='selectevent' value='Select Event'/><br>
		</form>
		";
		if ($edtevnt && count($edtevnt)) {
			echo"
			<form role ='form' id='edit_event' method='POST' action='events_admin.php'>
			<label>Name: </label><input type='text' name='eventname' value='{$edtevnt[0]['event_name']}'/>
			<label>About: </label><textarea name='about' cols='50' rows='5'>{$edtevnt[0]['about']}</textarea>
			<label>Event Category: </label>
				<select name='eventcat'>
					<option value='0'>Select event category: </option>";
					 $events = getEventCategories(); 
						for($i = 0; $i < count($events); $i++) {
							$evname = $events[$i]['name'];
							$id = $events[$i]['id'];
							echo "<option value='$id' "; if ($edtevnt[0]['event_category_id'] == $id) echo "selected"; echo ">".ucFirst($evname)."</option>";
						}
				echo "
				</select>
				<label>Rules: </label><textarea name='rules' cols='50' rows='10'>{$edtevnt[0]['rules']}</textarea>
				<label>Contacts: </label><textarea name='contacts' cols='50' rows='5'>{$edtevnt[0]['contacts']}</textarea>
				<label>Contest Link: </label><input type='text' name='clink' value={$edtevnt[0]['clink']}>
				<label>Start Date-Time: </label>";
				if ($edtevnt[0]['start']) {
					$strtarray = explode(" ", $edtevnt[0]['start']);
				} echo "
					<input type='hidden' name='startdt' value={$edtevnt[0]['start']}>
					<label>Date(Enter in yyyy/mm/dd format only): </label><input name='strtdate' type='text' value={$strtarray[0]}>
					<label>Time(Enter in hh:mm:ss 24-hrs format only): </label><input name='strttime' type='text' value={$strtarray[1]}>
				<label>End Date-Time: </label>";
				if ($edtevnt[0]['end']) {
					$endarray = explode(" ", $edtevnt[0]['end']);
				} echo "
				<input type='hidden' name='enddt' value={$edtevnt[0]['end']}>
				<label>Date(Enter in yyyy/mm/dd format only): </label><input name='enddate' type='text' value={$endarray[0]}>
				<label>Time(Enter in hh:mm:ss 24-hrs format only): </label><input name='endtime' type='text' value={$endarray[1]}>
				<input type='hidden' name='evntid' value={$evntid} />
				<input type='submit' name='editevent' value='Update' /><br>
			</form>
			";
		}
		echo"
		</div>
		</div>
		<div class='box' style='width:780px; margin:20px auto;'>
		<div class='table'>
		<form role ='form' id='delete_event' method='POST' action=''>
			<select name='eventname'>
				<option value='0'>Select event to be deleted: </option>";
				$events = getAllEvents(); 
				for($i = 0; $i < count($events); $i++) {
					$evname = $events[$i]['event_name'];
					$id = $events[$i]['id'];
					echo "<option value='$id' "; if ($evntid == $id) echo "selected"; echo ">".ucFirst($evname)."</option>";
				}
				echo "
				</select>
			<input type='submit' name='deleteevent' value='Delete Event'/><br>
		</form>
		</div>
		</div>
		<div class='box' style='width:780px; margin:20px auto;'>
		<div class='box-head'>
			<h2>Add News Feed</h2>
		</div>
		<div class='table'>
			<h4 style='margin-left:20px;margin-top:5px;	 padding:3px; color: rgb(216,71,71); line-height:20px;'>{$newsmsg} </h4>	
			<form role='form' id='addnews' method='POST' action=''>
				<label>Heading: </label><input type='text' name='heading'/>
				<label>Content: </label><textarea name='content' cols='100' rows='5'></textarea>
				<label>Link: </label><input type='text' name='link'/>
				<label>Event: </label>
				<select name='event_id_news'>
					<option value='0'>Select event: </option>";
					 $events = getAllEvents(); 
						for($i = 0; $i < count($events); $i++) {
							$evname = $events[$i]['event_name'];
							$id = $events[$i]['id'];
							echo "<option value='$id'>".ucFirst($evname)."</option>";
						}
				echo "
				</select>
				<input type='submit' name='addnews' value='Add News'/><br>	
			</form>
			
				
		</div>
		</div>
		<div class='box' style='width:780px; margin:20px auto;'>
		<div class='box-head'>
			<h2>Delete News Feed</h2>
		</div>
		<div class='table'>
			<h4 style='margin-left:20px;margin-top:5px;	 padding:3px; color: rgb(216,71,71); line-height:20px;'>{$newsdelmsg} </h4>	
			<form role='form' id='deletenews' method='POST' action=''>
				<select name='news_heading'>
					<option value='0'>Select news heading to be deleted: </option>";
					$news = getNews(); 
					for($i = 0; $i < count($news); $i++) {
						$heading = $news[$i]['heading'];
						$id = $news[$i]['id'];
						echo "<option value='$id'>".ucFirst($heading)."</option>";
					}
				echo "
				</select>
				<input type='submit' name='deletenews' value='Delete News'/><br>	
			</form>
			
				
		</div>
		</div>
		";
		
	
	
	}
		
	
?>

	
