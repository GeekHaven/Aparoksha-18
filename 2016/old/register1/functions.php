<?php
	require_once("config.php");
	require_once(PATH_TO_API);
 	require_once(PATH_TO_CONFIG_FILE);
 	require_once(PATH_TO_DB_CONNECT_FILE);
 	require_once(PATH_TO_DB_HANDLER_FILE);
 	
	
	function validate($team, $p1, $p2, $p3) 
	{	
		if($team == "")
			return "Please Enter Your Team Name.";
 		if(teamExists($team)) 
 			return "Team with this name is Already Registered.";
		
//  		if($p1 == "") 
//  			return "Please fill in userid of Representative.";
// 		
// 		if(!isActive($p1))
// 			return "Participant 1 is not registered.";
// 		else if (!isProfileComplete($p1))
// 			return "Profile of Participant 1 is not complete.";
// 			
// 			
// 		if($p2 != "" && !isAccountActive($p2))
// 			return "Participant 2 is not registered.";
// 		else if($p2 != "" && isAccountActive($p2)) {
// 			if(userAlreadyRegistered(getAccountid($p2)))
// 				return "Participant 3 is already registerd with another Team.";
// 			else if(!isProfileComplete($p2))
// 				return "Profile of Participant 2 is not complete.";
// 		}
// 				
// 				
// 		if($p3 != "" && !isAccountActive($p3))
// 			return "Participant 3 is not registered.";
// 		else if($p3 != "" && isAccountActive($p3)) {
// 			if(userAlreadyRegistered(getAccountid($p3)))
// 				return "Participant 3 is already registerd with another Team.";
// 			else if (!isProfileComplete($p3))
// 				return "Profile of Participant 3 is not complete.";
// 		}
			
		return 0;
		
	}
	
	function teamExists ($team) 
	{
		$sql = "SELECT * FROM mad_team WHERE team_name = :team";
		$params = array(':team' => $team);
		$result = DatabaseHandler::GetAll($sql, $params);
		
		if(count($result)) {
			return 1;
		}
		return 0;
	}
	
	function userAlreadyRegistered ($userid) 
	{
		
		$sql = "SELECT * FROM mad_registrations WHERE user_id = :userid";
		$parms = array(':userid' => $userid);
		$result = DatabaseHandler::GetAll($sql, $parms);
		
		if(count($result)) {
			return 1;
		}
		return 0;
	}
	
	function addTeam ($team, $p1, $p2="", $p3="") 
	{
		$sql = "INSERT INTO mad_team(team, register_date) VALUES(:team, NOW())";
		$parms = array(':team', $team);
		$result = DatabaseHandler::Execute($sql, $parms);
		
		$teamid = getTeamId($team);
		if($p1) {
			$sql = "INSERT INTO mad_registrations(user_id, team_id) VALUES(:p1, :teamid)";
			$parms = array(':p1' => $p1, ':teamid' => $teamid);
			$result = DatabaseHandler::Execute($sql, $parms);
		}
		if($p2) {
			$sql = "INSERT INTO mad_registrations(user_id, team_id) VALUES(:p2, :teamid)";
			$parms = array(':p2' => $p2, ':teamid' => $teamid);
			$result = DatabaseHandler::Execute($sql, $parms);
		}
		if($p3) {
			$sql = "INSERT INTO mad_registrations(user_id, team_id) VALUES(:p3, :teamid)";
			$parms = array(':p3' => $p3, ':teamid' => $teamid);
			$result = DatabaseHandler::Execute($sql, $parms);
		}
		return 1;
	}
	
	function getTeamDetails ($teamid) 
	{
	
	}
	
	function getTeamId ($team) 
	{
		$sql = "SELECT * FROM mad_team WHERE team_name=:team";
		$parms = array(':team' => $team);
		$result = DatabaseHandler::GetAll($sql, $parms);
	
		return $result[0]['id'];
	}
	
	
	
?>