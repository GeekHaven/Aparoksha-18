<?php

require_once(__DIR__."/../event/includes/includes_reg/enc_reg_fun.php");
require_once(__DIR__."/../event/includes/seed/seed.php");
//	error_reporting(error_reporting() & ~E_DEPRECATED);
	function redirectTo ($url) 
	{
		header('Location:'.$url);
	}

	function format_date($str) {
                $month = array(" ", "Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec");
                $y = explode(' ', $str);
                $x = explode('-', $y[0]);
		$t = explode(':', $y[1]);
                $date = "";
                $m = (int)$x[1];
                $m = $month[$m];
                $st = array(1, 21, 31);
                $nd = array(2, 22);
                $rd = array(3, 23);
                if(in_array( $x[2], $st)) {
                        $date = $x[2].'st';
                }
                else if(in_array( $x[2], $nd)) {
                        $date .= $x[2].'nd';
                }
                else if(in_array( $x[2], $rd)) {
                        $date .= $x[2].'rd';
                }
                else {
                        $date .= $x[2].'th';
                }
                $date .= ' ' . $m . ',' . '  &nbsp; ' . $t[0].':' . $t[1];
               // $date .= ' ' . $m . ', ' . $x[0];

                return $date;
        }
		
	function registerFormValidate ($email, $username, $passwd, $cpasswd, $phone) 
	{
	      $msg = "";
// 	      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 		   $msg = " Please Enter a valid email id.";
// 	      }
		
	      if (existAccount($username)) {
		   $msg .= " Try a different username.";
	      } 
	      if(existEmail($email)) 
		   $msg .= " Email already taken up.";
		  if (existPhone($phone)) {
		  	$msg .= " Phone number already registered.";
		  }
	      if ($passwd != $cpasswd) {
		   $msg .= " Confirm password doesn't match with password.";
	      }
	      else if (strlen($passwd) < 6) {
		  $msg .= " Password should be atleast 6 characters long.";
	      }
	      if($msg == "") {
		  $valid = 1;
	      }
	      else {
		  $valid = $msg;
	      }
	      
	      return $valid;
 	}
	
	function generateCode($username, $email) //Generate confirmation code to activate account
	{
		$str = "";
		$str = ENCRYPT. $username . $email;
		$str = SHA1($str);
		return $str;
	}
	
	function existAccount($username) //Check if a username already exists
	{
	
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) == 1)
			return 1;
		return 0;
	}
	
	function existEmail($email) //Check if a email already exists
	{
	
		$sql = "SELECT * FROM users WHERE email = :email AND isdeleted = 0";
		$params = array(':email' => $email);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) > 0)
			return 1;
		return 0;
	}

	function existPhone($phone)
	{
		$sql = "SELECT user_id FROM user_details WHERE contact = :phone";
		$params = array(':phone' => $phone);
		$result = DatabaseHandler::GetAll($sql, $params);
		if (count($result) == 0) {
			return 0;
		} else {
			$sql = "SELECT isdeleted FROM users WHERE id = :id";
			$params = array(':id' => $result[0]['user_id']);
			$output = DatabaseHandler::GetAll($sql, $params);
			if ($output[0]['isdeleted'] == 1) {
				return 0;
			} else {
				return 1;
			}
		}
	}
	
	function isAccountActive ($username) 
	{
		if(existAccount($username)) {
			$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
			$params = array(':username' => $username);
			$result = DatabaseHandler::GetAll($sql, $params);
			
			return $result[0]['isactive'];
		} else {
			return 0;
		}
	}
	
	function addAccount($username, $password, $email, $phone) //Create a new account
	{
		$code = generateCode($username, $email);
		$password = ENCRYPT . $password;
		$password = SHA1($password);
		$added_by = "admin";
		
		//Add an account
		$sql = "INSERT INTO users(username, password, code, email, added_by, added_on) VALUES(:username, :password, :code, :email, :added_by, NOW())";
		$params = array(':username' => $username, ':password' => $password, ':email' => $email, ':code' => $code, ':added_by' => $added_by);
		$result = DatabaseHandler::Execute($sql, $params);
		
		//Add empty profile for that account
		$user_id = getAccountid($username);
		$sql = "INSERT INTO user_details(user_id, contact, added_on) VALUES(:user_id, :phone, NOW())";
		$params = array(':user_id' => $user_id, ':phone' => $phone);
		$result = DatabaseHandler::Execute($sql, $params);
		
		//login time 
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO log_login_sessions(username, ip) VALUES(:username, :ip)";
		$params = array(':username' => $username, ':ip' => $ip);
		$result = DatabaseHandler::Execute($sql, $params);
		
		return;
	}
	
	function activateAccount($username) // Activate an account 
	{
		$sql = "UPDATE users SET isactive = 1 WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::Execute($sql, $params);
		return 1;
	}
	
	function validateAccount($code) //Confirm email address using code and validate the account
	{
		$sql = "SELECT * FROM users WHERE code = :code AND isdeleted = 0";
		$params = array(':code' => $code);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) == 1)
		{
			$username = $result[0]['username'];
			activateAccount($username);
			return 1;
		}
		return 0;
	}
	
	function getAccountid($username) //Returns ID of the selected username
	{
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result[0]['id'];
	}
	
	function getAccount($user_id)  // Returns account information
	{
		$sql = "SELECT * FROM users WHERE user_id = :user_id AND isdeleted = 0";
		$params = array(':user_id' => $user_id);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function getAccountbyname($username)  // Returns account information
	{
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function getAccountEmail($username)  // Returns email address of the account
	{
		$sql = "SELECT * FROM users WHERE username = :username AND isdeleted = 0";
		$params = array(':username' => $username);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result[0]['email'];
	}
	
	function saveProfile($user_id, $name, $college_id, $profession, $gender, $accommodation, $address) //Update any changes to profile
	{
		$x = 10000 + $user_id;
		$reg_id = "APO2015" . $x;
		$lock = 1;
		$sql = "UPDATE user_details SET name = :name, college_id = :college_id, profession = :profession, gender = :gender, modified_on = NOW(), accommodation = :accommodation, address = :address, reg_id = :reg_id, locked = :lock WHERE user_id = :user_id AND isdeleted = 0";
		$params = array(':user_id' => $user_id, ':name' => $name, 'college_id' => $college_id, ':profession' => $profession, ':gender' => $gender,':accommodation' => $accommodation, ':address' => $address, ':reg_id' => $reg_id, ':lock' => $lock);
		$result = DatabaseHandler::Execute($sql, $params);
	}
	
	function getProfile($user_id) // Return profile data of a user
	{
		$sql = "SELECT * FROM user_details WHERE user_id = :user_id AND isdeleted = 0";
		$params = array(':user_id' => $user_id);
		$result = DatabaseHandler::GetAll($sql, $params);
		
		return $result;
	}
	
	function getProfilebyname($username) // Return profile data of a user
	{
		$user_id = getAccountid($username);
		$sql = "SELECT * FROM user_details WHERE user_id = :user_id AND isdeleted = 0";
		$params = array(':user_id' => $user_id);
		$result = DatabaseHandler::GetAll($sql, $params);
		
		return $result;
	}
	
	
	function isProfileComplete($username) //Check if a profile is complete or not. Only complete profiles can participate in events.
	{
		$profile = getProfilebyname($username);
		if(trim($profile[0]['name']) == "" || trim($profile[0]['contact']) == "" || trim($profile[0]['college_id']) == "")
			return 0;
		else
			return 1;
	}
	
	function isProfileLocked($username)
	{
		$profile = getProfilebyname($username);
		if($profile[0]['lock'] == 1)
			return 1;
		else
			return 0;
	}
	
	function addEvent($event_name, $event_category_id, $added_by = "admin")
	{
		$sql = "INSERT INTO events(event_name, event_category_id, added_by, added_on) VALUES(:event_name, :event_category_id, :added_by, NOW())";
		$params = array(':event_name' => $event_name, ':event_category_id' => $event_category_id, ':added_by' => $added_by);
		$result = DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	function editEvent($event_id, $eventname, $event_category_id, $about, $rules, $contacts, $clink, $strtdate, $enddate, $modified_by="admin")
	{
		$sql = "UPDATE events SET event_name = :eventname, event_category_id = :event_category_id, about = :about, contacts = :contacts, rules = :rules, clink = :clink, start = :strtdate, end = :enddate, modified_on = NOW(), modified_by = :modified_by WHERE id = :event_id AND isdeleted = 0";
		$params = array(':event_id' => $event_id, ':eventname' => $eventname, 'event_category_id' => $event_category_id, 'contacts' => $contacts, ':rules' => $rules, ':about' => $about, ':clink' => $clink, ':strtdate' => $strtdate, ':enddate' => $enddate, ':modified_by' => $modified_by);
		$result = DatabaseHandler::Execute($sql, $params);
	}
	
	function getEventCategories()
	{
		$sql = "SELECT * FROM event_categories WHERE isdeleted = 0";
		$result = DatabaseHandler::GetAll($sql);
		return $result;
	}
	
	function getAllEvents()
	{
		$sql = "SELECT * FROM events WHERE isdeleted = 0";
		$result = DatabaseHandler::GetAll($sql);
		return $result;
	}
	
	function getEventbyid($event_id)
	{
		$sql = "SELECT * FROM events WHERE id = :event_id AND isdeleted = 0";
		$params = array(':event_id' => $event_id);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function deleteEvent($event_id, $modified_by="admin")
	{
		$sql = "UPDATE events SET isactive = 0, isdeleted = 1, modified_on = NOW(), modified_by = :modified_by WHERE id = :event_id AND isdeleted = 0";
		$params = array(':event_id' => $event_id, ':modified_by' => $modified_by);
		$result = DatabaseHandler::Execute($sql, $params);
	}
	
	function registerEvent($event_id, $userid, $added_by)
	{
		$sql = "INSERT INTO registrations(user_id, event_id, added_by, added_on) VALUES(:user_id, :event_id, :added_by, NOW())";
		$params = array(':user_id' => $userid, ':event_id' => $event_id, ':added_by' => $added_by);
		$result = DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	function addOrganizer($userid, $event_id)
	{
	
	}
	
	function getColleges () 
	{
		$sql = "SELECT * FROM colleges WHERE isdeleted = 0 AND isactive = 1";
		$params = array();
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function getCollegebyid ($id) 
	{
		$sql = "SELECT * FROM colleges WHERE id = :id AND isdeleted = 0";
		$params = array(':id' => $id);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function alreadyRegistered($user_id, $event_id)
	{
		$sql = "SELECT * FROM registrations WHERE user_id = :user_id AND event_id = :event_id AND isdeleted = 0";
		$params = array(':user_id' => $user_id, ':event_id' => $event_id);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) > 0)
			return 1;
		return 0;
			
	}
	
	function alreadyRegistered1($uid, $event)//event registration
	{
		$enc = new ENC_REG();
	
		$event = constant($event);
		$event = $enc->encrypt($event);

		$uid = $enc->cleanString($uid);
		$uid = $enc->encrypt($uid);

		$sql = "SELECT * FROM event_part WHERE uid = :user_id AND event = :event_id";
		$params = array(':user_id' => $uid, ':event_id' => $event);
		$result = DatabaseHandler::GetAll($sql, $params);
		if(count($result) > 0)
			return 1;
		return 0;
			
	}
	
	function getRegisteredEvents($userid)  // Returns list of registered events of the user
	{
		$sql = "SELECT * FROM registrations WHERE user_id = :userid AND isdeleted = 0";
		$params = array(':userid' => $userid);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function getNews()
	{
		$sql = "SELECT * FROM news WHERE isdeleted = 0";
		$result = DatabaseHandler::GetAll($sql);
		return $result;
	}
	
	function addNews($content, $heading, $link, $event_id, $added_by)
	{
		$sql = "INSERT INTO news (content, heading, link, event_id, added_by, added_on) VALUES(:content, :heading, :link, :event_id, :added_by, NOW())";
		$params = array(':content' => $content, ':heading' => $heading, ':link' => $link, ':event_id' => $event_id, ':added_by' => $added_by);
		$result = DatabaseHandler::Execute($sql, $params);
		return;
	}
	
	function getCategory($id)
	{
		$sql = "SELECT * FROM event_categories WHERE id = :id AND isdeleted = 0";
		$params = array(':id' => $id);
		$result = DatabaseHandler::GetAll($sql, $params);
		return $result;
	}
	
	function deleteNews($id, $modified_by)
	{
		$sql = "UPDATE news SET isactive = 0, isdeleted = 1, modified_on = NOW(), modified_by = :modified_by WHERE id = :id AND isdeleted = 0";
		$params = array(':id' => $id, ':modified_by' => $modified_by);
		$result = DatabaseHandler::Execute($sql, $params);
	}

	function getUsernameByCode($code)
	{
		$sql = "SELECT username FROM users WHERE code = :code";
		$params = array(':code' => $code);
		$result = DatabaseHandler::Execute($sql, $params);
		return $result[0]['username'];
	}
	
?>
