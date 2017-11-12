<?php
 
$accomodation = "";
$githubId = "";
$userExp = "";
$resume = "";
$mhl_username = "";
$mhl_email = "";
$valid = "";
$success = "";
$errmsg = "";

if(isset($_POST['register'])) { 
	

		$targetDir = "./resume/";
		//$accomodation = $_POST['accomodation'];
		if ($_POST['accomodation'] == "accomodation") $accomodation = "Yes";
		else $accomodation = "No";
		$githubId = $_POST['githubId'];
		$mhl_username = $_POST['mhl_username'];
		$mhl_email = $_POST['mhl_email'];
		$userExp = $_POST['userExp'];
		$resume_dir = $targetDir . $githubId . "_" . basename($_FILES['resume']['name']);
		$resume = $githubId . "_" . $_FILES['resume']['name'];
		if($githubId != "" && $accomodation != "" && $userExp != "" && $resume != "" && $mhl_username != "" && $mhl_email != "") {
			$valid = HITNFormValidate($githubId, $accomodation, $userExp, $resume, $mhl_username, $mhl_email);
			$validCaptcha = 1;			
	
			if ($valid == 1 && $validCaptcha == 1) {
				if ($_FILES['resume']['type'] != "application/pdf") {
				 $errmsg = "<p>Resume must be uploaded in PDF format.</p>";
			      } else {				
				$result = move_uploaded_file($_FILES['resume']['tmp_name'], $resume_dir);
				 if ($result == 1) {
					updateHITN($githubId, $accomodation, $userExp, $resume, $mhl_username,$mhl_email);				
					$success = "<p>Details Updated. We will get back to you soon.</p>";
				}
				 else $errmsg = "<p>There was a problem uploading the file.</p>";
				
			      }
			}
			else {
				if($valid != 1)
					$errmsg = $valid;
				if(!$validCaptcha) {
					$errmsg .= " Captcha is incorrect.";
				}
			}
		} else {
			$errmsg = "Fill in Complete Form. All Fields are Necessary.";
		}
	

	

}
	
?>

<div id="reg" >
    <form enctype='multipart/form-data' class="col s8" role='form' action='?page=hitn' method='post'>
      <div class="row"  style="color:white;margin-top:5rem;">

<p style="color:white;font-size:35px; font-family:Cursive;margin-left:190px;">Hack In The North Details</p>

	  </div>
	  
		<div class="row">
		<?php if($success != "") die($success); 
			if($errmsg != "") echo $errmsg; 
		?>
		<div class="switch col s6">
			<label style="color:white;"><b>Accomodation Required:</b></label><br><br>
			<label style="color:white;">
				No
				<input type="checkbox" name="accomodation" value="accomodation">
				<span class="lever"></span>
				Yes
			</label>
		</div>
		<div class="input-field col s6">
		  <input id="icon_prefix55" type="text" name="githubId" style="color:white;">
		  <label for="icon_prefix55" style="color:white;" >Github ID</label><div id="message"></div>
		</div>
		<div class="row">
			<div class="input-field col s6">
			  <input id="icon_prefix56" type="text" name="mhl_username" style="color:white;">
			  <label for="icon_prefix56" style="color:white;" >MLH Name</label><div id="message"></div>
			</div>
			<div class="input-field col s6">
			  <input id="icon_prefix57" type="text" name="mhl_email" style="color:white;">
			  <label for="icon_prefix57" style="color:white;" >MLH Email ID</label><div id="message"></div>
			</div>
		</div>
	       <div class="row">
		<div class="input-field col s10">
		  <textarea id="icon_prefix4" name="userExp"style="color:white;" class="materialize-textarea"></textarea>
		  <label for="icon_prefix4" style="color:white;" >Hackathon Experience (Even "none" is a valid answer)</label>
		</div>
	       </div>
	       <div class="row">
		<div class="file-field input-field col s8">
		      <div class="btn">
			<span>Resume(pdf)</span>
			<input type="file" name="resume">
		      </div>
		      <div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		      </div>
		    </div>
	       </div>
	     <div class="row">
		<div class="col s6" style="margin-left:0px">
		<button class="btn waves-effect waves-light" type="submit" name="register" value="Register">Update
    <i class="material-icons right">send</i>
  </button>
</div>
       </div>
		
       </div> 
    
       
	  
	 
    </form>
	</div>

