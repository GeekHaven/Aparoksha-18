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
		$target_path = "uploads/".$username. '_' . $qid. '_' . $time . '.zip';
		
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
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select zip to upload:
    <input type="file" name="uploadedfile" id="uploadedfile">
    <input type="submit" value="Upload Zip" name="submit">
</form>

</body>
</html>