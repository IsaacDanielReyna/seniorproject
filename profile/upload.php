<?php
function upload($user, $file)
{
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($user->id.'-'.$_FILES["file_data"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["file_data"]["tmp_name"]);
		if($check !== false) {
			$message =  "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$message =  "File is not an image.";
			$uploadOk = 0;
		}
	}
	/** Check if file already exists
	if (file_exists($target_file)) {
		$message =  "Sorry, file already exists.";
		$uploadOk = 0;
	}/**/
	
	//TODO: check name length limit to 255
	
	// Check file size
	if ($_FILES["file_data"]["size"] > 100000) {
		$messages[] =  "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$messages[] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$messages[] =  "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["file_data"]["tmp_name"], $target_file)) {
			$messages[] = "Uploaded successful.";//$messages[] =  "The file ". basename( $_FILES["file_data"]["name"]). " has been uploaded.";
		} else {
			$messages[] =  "Sorry, there was an error uploading your file.";
		}
	}
	
	$alert = new stdClass();
	if ($uploadOk == 1)
		$alert->type = 'success';
	else
		$alert->type = 'danger';
	$alert->messages = $messages;
	
	return $alert;
}
?>