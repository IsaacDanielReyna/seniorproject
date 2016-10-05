<?
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	function HasPermission()
	{
		return true;
	}
	function uploadfile($file)
	{
		echo "inside<br>";
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["file_data"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["file_data"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		if ($_FILES["file_data"]["size"] > 100000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["file_data"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["file_data"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	
	if ($_POST)
	{
		$data = (object) $_POST;
		if (HasPermission())
		{
			uploadfile($data->file_data);
			try
			{	
				$sql = "UPDATE users SET
				first_name=:first_name,
				middle_name=:middle_name,
				last_name=:last_name,
				phone_number=:phone_number,
				street_address=:street_address,
				city=:city,
				state=:state,
				zip_code=:zip_code
				WHERE id=:user_id";
				
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':user_id', $user->id );
				$stmt->bindParam( ':first_name', $data->first_name );
				$stmt->bindParam( ':middle_name', $data->middle_name );
				$stmt->bindParam( ':last_name', $data->last_name );
				$stmt->bindParam( ':phone_number', $data->phone_number );
				$stmt->bindParam( ':street_address', $data->street_address );
				$stmt->bindParam( ':city', $data->city );
				$stmt->bindParam( ':state', $data->state );
				$stmt->bindParam( ':zip_code', $data->zip_code );
				$stmt->execute();
			}
			catch( PDOException $e )
			{
				print "ERROR: ".$e->getMessage()."<br/>";
				die();
			}
		}
	}
?>