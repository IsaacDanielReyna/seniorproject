<?
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	require_once("upload.php");
	
	function HasPermission()
	{
		return true;
	}
	

	if ($_POST)
	{
		$data = (object) $_POST;
		if (HasPermission())
		{
			try
			{					
				$set[] = "first_name=:first_name";
				$set[] = "middle_name=:middle_name";
				$set[] = "last_name=:last_name";
				$set[] = "phone_number=:phone_number";
				$set[] = "address=:address";
				$set[] = "city=:city";
				$set[] = "state=:state";
				$set[] = "zip_code=:zip_code";

				// photo failed, should i still update?
				// no photo uploaded, what message should i output
				if ($_FILES['file_data']['name'] != null)
				{
					$alert = upload($user, $_FILES);
					$_SESSION['alert'] = $alert;
					
					if ($alert->type == 'success')
						$set[] = "photo=:photo";
				}
				
				
				$sql = "UPDATE users SET " . implode(', ',$set). " WHERE id=:user_id";
				
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':user_id', $user->id );
				$stmt->bindParam( ':first_name', $data->first_name );
				$stmt->bindParam( ':middle_name', $data->middle_name );
				$stmt->bindParam( ':last_name', $data->last_name );
				$stmt->bindParam( ':phone_number', $data->phone_number );
				$stmt->bindParam( ':address', $data->street_address );
				$stmt->bindParam( ':city', $data->city );
				$stmt->bindParam( ':state', $data->state );
				$stmt->bindParam( ':zip_code', $data->zip_code );
				
				if ($alert->type == 'success')
				{
					$filename = $user->id.'-'.$_FILES['file_data']['name'];
					$stmt->bindParam( ':photo', $filename );
				}

				$stmt->execute();
				
				
				if ($data->page == "profile")
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				else
					json_encode($alert);
			}
			catch( PDOException $e )
			{
				print "ERROR: ".$e->getMessage()."<br/>";
				die();
			}
		}
	}
?>