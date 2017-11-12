<?php
//file_puts_content("a.txt", 'here');

if(isset($_POST["submit"]) && isset($_FILES["uploadedfile"]["name"])) {
	$filename = $_FILES["uploadedfile"]["name"];
	$source = $_FILES["uploadedfile"]["tmp_name"];
	$type = $_FILES["uploadedfile"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		}
	}
	
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
	    $message = "The file you are trying to upload is not a .zip file. Please try again.";
	} else {
		$username = "iit";
		$time = time();
		$qid = '1';
		$target_path = getcwd().DIRECTORY_SEPARATOR .$username. '_' . $qid. '_' . $time . '.zip';
		
		//$destination_path = getcwd().DIRECTORY_SEPARATOR;
		//$target_path = $destination_path . basename( $_FILES["profpic"]["name"]);
		//@move_uploaded_file($_FILES['profpic']['tmp_name'], $target_path)

		if(move_uploaded_file($source, $target_path)) {
			$message = "Your solution has been submitted.";
		} else {	
			$message = "There was a problem with the upload. Please try again.";
		}
	}
        
        echo $message;
}
?>

<!DOCTYPE html>
<html>
<body align="center">
<h1>BlackBox</h1>
<form action="upload12.php" method="post" enctype="multipart/form-data">
<table align="center" style="margin-top: 5em" >
	<tr>
		<th colspan=2>Question 1 Submission<br><br></th>
	</tr>
	<tr>
		<td>Select zip to upload:<br><br><br></td>
		<td style="padding-left: 1em"><input type="file" name="uploadedfile" id="uploadedfile"><br><br><br></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Upload Zip" name="submit"></td>
	</tr>
</table>
</form>

</body>
</html>