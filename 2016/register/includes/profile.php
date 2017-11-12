<?php 
$name = "";
$inst = "";
$gender = "";
$prof = "";
$accommodation = "";
$team = "";
$noteam = "";
$address = "";
$msg = "";
$success = "";
if(isset($_POST['update'])) {
		$name = addslashes(htmlentities(trim($_POST['name'])));
		$inst = addslashes(htmlentities(trim($_POST['institute'])));
		$gender = addslashes(htmlentities(trim($_POST['gender'])));
		$prof = addslashes(htmlentities(trim($_POST['prof'])));
		$accommodation = "";
		$team = "";
		$noteam = "";
		$address = addslashes(htmlentities($_POST['address']));
		$guvera_id = addslashes(htmlentities($_POST['guvera_id']));
		
		$user_id = getAccountid($_SESSION['user']);
		if($name == "")
			$msg = "Please Enter Your Full Name.<br/>"; 
		if ($inst == 0) 
			$msg .= "Select your institution. <br/>";

		else if($name != "" && $inst != 0) {
			saveProfile($user_id, $name, $guvera_id, $inst, $prof, $gender, $accommodation, $address);
			$success = "Your information is successfully updated !!";
		}	
}

?>

<div id="main">
	<div id="" style="width:540px; margin:auto; padding-top:10px;">
		<!-- Box -->
		<div class="box">
			<!-- Box Head -->
			<div class="box-head">
			<h2 class="left" style="margin-top:5rem;">Your Personal Details	</h2>
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
			<form  role='form' action='' method='post' style='padding-bottom:5rem;'>
				<p style='color:#ffa800'>You are allowed to edit this information only once.</p>
				<h5>Please enter your Guvera ID below to win exciting prizes worth Rs. 10k.To know more about this,<a href='#guvera-details' class='modal-trigger'> click here.</a> To register to guvera, <a href='https://www.guvera.com/login?state=sign-up-email'>click here</a></h5>
				<div class='input-field col s12'>
		
				  <input  id='first_name' type='text' required='required' name='username' style='color:white;' class='validate' value='$username' readonly>
				  <label for='first_name' style='color:white;'>User Name</label>
				</div>
				
				 
				
				
				<div class='input-field col s12'>
		
				  <input  id='email' type='text' required='required' name='email' style='color:white;' class='validate' value='$email' readonly>
				  <label for='email' style='color:white;'>Email</label>
				</div>
				
				<div class='input-field col s12' id='guvera-id'>
		
				  <input  id='guvera_id' type='text' required='required' name='guvera_id' style='color:white;' class='validate'>
				  <label for='guvera_id' style='color:white;'>Guvera ID</label>
				</div>
				
				
				
				<div class='input-field col s12'>
		
				  <input  id='name' type='text' required='required' name='name' style='color:white;' class='validate' value='$name'>
				  <label for='name' style='color:white;'>Name</label>
				</div>
				
				<div class='input-field col s12'>
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

				</div>
								
				
				<div class='input-field col s12'>
		
				  <input  id='prof' type='text' required='required' name='prof' style='color:white;' class='validate' value='$prof'>
				  <label for='prof' style='color:white;'>Profession</label>
				</div>
  
				<div class='input-field col s12'>
				<select name='gender' >
					<option value=''>Your Gender </option>
					<option value='male'>Male</option>
					<option value='female'>Female</option>					 
					
				</select>

				</div>
					
				
				
				<div class='input-field col s12'>
          <textarea id='icon_prefix22' name='address' style='color:white;' class='materialize-textarea'></textarea>
          <label for='icon_prefix22' style='color:white;'>Address</label>
        </div>
				
				
				<button class='btn waves-effect waves-light' type='submit' name='update' onclick='return confirm(\"Are you sure ? Do you really want to continue ? You would not be able to edit your information again.\");'>Update
    <i class='material-icons right'>send</i>
  </button>
				
			</form>
";
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
			<script>
				function unhide() {
					$('#not').css("display","block");
				}
				
				function hide() {
					$('#not').css("display", "none");
				}
				
			</script>
			
			
			<!-- Pagging -->

			<!-- End Pagging -->
			</div>
			<!-- Table -->
		</div>
	</div>
</div>

<div id="guvera-details" class="modal" style="color: black;">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
<script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
</script>
