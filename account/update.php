<?
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	function IsNullOrEmpty($str)
	{
		$result = false;
		$str = preg_replace('/\s+/', '', $str);
		if ($str == null || $str == '')
			$result = true;
		return $result;
	}
	
	function alert($type, $message)
	{
		$alert = new stdClass();
		if ($type == null || $type == "")
			$alert->type = "alert alert-info alert-dismissible";
		else
			$alert->type = "alert alert-".$type. " alert-dismissible";
		
		$alert->isset = true;
		$alert->message = $message;
		return $alert;
	}
	
	function HasPermission()
	{
		return true;
	}
	
	if ($_POST)
	{
		$data = (object) $_POST;
		if (HasPermission())
		{
			if (IsNullOrEmpty($data->email))
				$json->alert = alert("danger", "Email must not be empty.");
			else if (IsNullOrEmpty($data->pw1) || IsNullOrEmpty($data->pw2))
				$json->alert = alert("danger", "Password fields must not be empty.");
			else if ($data->pw1 != $data->pw2)
				$json->alert = alert("danger", "Passwords do not match.");
			else
			{
				$password = password_hash($data->pw1, PASSWORD_DEFAULT, ['cost' => 12]);
				try
				{
					$sql = "UPDATE users SET
					password=:password,
					email=:email
					WHERE id=:user_id";
					
					$stmt = $conn->prepare($sql);
					$stmt->bindParam( ':user_id', $user->id );
					$stmt->bindParam( ':password', $password );
					$stmt->bindParam( ':email', $data->email );
					$stmt->execute();
					$json->alert = alert("success", "Password updated");
					$json->success = true;
				}
				catch( PDOException $e )
				{
					$json->alert = alert("danger", $e->getMessage());
					echo json_encode($json);
					die();
				}
			}
		}
		else
			$json->alert = alert("danger", "Insufficient Permissions");
		
		echo json_encode($json);
	}
?>