<?php
$name = "";
$inst = "";
$gender = "";
$prof = "";
$accommodation = "";
$address = "";
$msg = "";
$success = "";
if(isset($_POST['update'])) {
		$name = addslashes(htmlentities(trim($_POST['name'])));
		$inst = addslashes(htmlentities(trim($_POST['institute'])));
		$gender = addslashes(htmlentities(trim($_POST['gender'])));
		$prof = addslashes(htmlentities(trim($_POST['prof'])));
		$accommodation = addslashes(htmlentities(trim($_POST['accom'])));
		$address = addslashes(htmlentities($_POST['address']));
		
		$user_id = getAccountid($_SESSION['user']);
		if($name == "")
			$msg = "Please Enter Your Full Name.<br/>"; 
		if ($inst == 0) 
			$msg .= "Select your institution. <br/>";

		else if($name != "" && $inst != 0) {
			saveProfile($user_id, $name, $inst, $prof, $gender, $accommodation, $address);
			$success = "Your information is successfully updated !!";
		}	
}

?>

<div id="main">
	<div id="" style="width:540px; margin:20px auto; padding-top:10px;">
		<!-- Box -->
		<div class="box">
			<!-- Box Head -->
			<div class="box-head">
			<h2 class="left">Your Personal Details	</h2>
			</div>
			<!-- End Box Head -->
			<!-- Table -->
			<div class="table">
			
			<?php echo "<p style='margin-left:20px;margin-top:5px;	 padding:3px; color: rgb(216,71,71); line-height:20px; font-size:12px;'>{$msg} </p>";
			echo "<p style='margin-left:20px;margin-top:5px; padding:3px; color:#74a446; line-height:20px; font-size:12px;'>{$success} </p>";
			?>
			<?php 
					$username = $_SESSION['user'];
					$user_id = getAccountid($username);
					$profile = getProfile($user_id);
					$email = getAccountEmail($username);
			?>
			<?php if(!$profile[0]['locked'])  {
			 echo "
			<form  role='form' action='' method='post'>
				<label style='color:#ffa800'>You are allowed to edit this information only once.</label>
				<label>Username:</label>
				<input type='text' name='username' value='$username' readonly/>
				<label>Email:</label> 
				<input type='text' readonly  name='email' value='$email'/>
 
				<label>Full Name:</label>
				<input type='text' name='name' value='$name'/>

				<label>Institute:</label>
				<select name='institute' >
					<option value='0'>Select your institute </option>";
					 $coll = getColleges(); 
						for($i = 0; $i < count($coll); $i++) {
							$name = $coll[$i]['name'];
							$id = $coll[$i]['id'];
							echo "<option value='$id' "; if ($inst == $id) echo "selected"; echo ">$name</option>";
						}
					
				echo "
				</select>
				<label>Profession:</label>
				<input type='text' name='prof' value = '$prof' />
  
				<label>Gender:</label>
				<input type='radio' name='gender' value='male'";
				 if($gender == 'male' || $gender=="") echo "checked='checked' "; echo " /> Male
				<input type='radio' name='gender' value='female'";
				 if($gender == 'female') echo " checked='checked' "; echo "/> Female
				
				<label>Address: </label>
				<textarea name='address' style='max-width:300px;' rows='4'> {$address}</textarea>
				
				<label>Need Accommodation:</label>
				<input type='radio' name='accom' value=0 "; if($accommodation == 0 || $accommodation=="") echo "checked='checked' "; echo 
				" /> No
				<input type='radio' name='accom' value=1"; if($accommodation == 1) echo " checked='checked' "; echo " /> Yes
				
				<input type='submit' name='update' value='Update your info' onclick='return confirm(\"Are you sure ? Do you really want to continue ? You would not be able to edit your information again.\");'/>
				
				
			</form>";
			} else {
				echo "
				 <div class='table'>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
		  <tr class='odd'>
              
                <td style='text-align:left;'><h3>Registration ID:</h3></td>
                <td style='text-align:left;'>{$profile[0]['reg_id']}</td>
              
              </tr>
		 <tr>
              
                <td style='text-align:left;'><h3>Username:</h3></td>
                <td style='text-align:left;'>{$username}</td>
              
              </tr>
              <tr class='odd'>
                
                <td style='text-align:left;'><h3>Full Name:</h3></td>
                <td style='text-align:left;'>{$profile[0]['name']}</td> 
                 
              </tr>
              <tr>
              
                <td style='text-align:left;'><h3>Institute:</h3></td>
                <td style='text-align:left;'>"; $clg= getCollegebyid ($profile[0]['college_id']); echo " {$clg[0]['name']}</td>
              
              </tr>
              <tr class='odd'>
                
                <td style='text-align:left;'><h3>Profession:</h3></td>
                <td style='text-align:left;'>{$profile[0]['profession']}</td> 
                 
              </tr>
              <tr>
              
                <td style='text-align:left;'><h3>Gender:</h3></td>
                <td style='text-align:left;'>{$profile[0]['gender']}</td>
              
              </tr>
              <tr class='odd'>
                
                <td style='text-align:left;'><h3>Address:</h3></td>
                <td style='text-align:left;'>{$profile[0]['address']}</td> 
                 
              </tr>
              <tr>
              
                <td style='text-align:left;'><h3>Contact:</h3></td>
                <td style='text-align:left;'>{$profile[0]['contact']}</td>
              
              </tr>
              <tr class='odd'>
                
                <td style='text-align:left;'><h3>Accommodation:</h3></td>
                <td style='text-align:left;'>"; if($profile[0]['accommodation']) echo "Yes"; else echo "NO"; echo "</td> 
                 
              </tr>
              <tr>
              
                <td style='text-align:left;'><h3>Email:</h3></td>
                <td style='text-align:left;'>{$email}</td>
              
              </tr>
		</table>
		";
			}
		?>
			
			
			
			<!-- Pagging -->

			<!-- End Pagging -->
			</div>
			<!-- Table -->
		</div>
	</div>
</div>
