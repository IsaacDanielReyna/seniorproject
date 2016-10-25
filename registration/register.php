<?php
	function IsNullOrEmpty($str)
	{
		$result = false;
		$str = preg_replace('/\s+/', '', $str);
		if ($str == null || $str == '')
			$result = true;
		return $result;
	}
	
	function start_session($user_id)
	{
		session_start();
		session_regenerate_id ();
		$_SESSION['session_valid'] = 1;
		$_SESSION['session_user_id'] = $user_id;
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
	
	if ($_POST)
	{
		$json = new stdClass();
		
		$username = $_POST['username'];
		$email = $_POST['email'];
		if ($_POST['password1'] != $_POST['password2'])
			$json->alert = alert("danger", "Error: Passwords do not match.");
		else
		{
			$password = $_POST['password1'];

			if (IsNullOrEmpty($username) || IsNullOrEmpty($password)|| IsNullOrEmpty($email))
			{
				$json->alert = alert("danger", "Error: Form elements must not be empty.");
			}
			else
			{
				require_once("../scripts/dbconnect.php");
				try
				{	
					$sql = "SELECT * FROM users WHERE `username` = :db_username OR `email` = :db_email";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam( ':db_username', $username );
					$stmt->bindParam( ':db_email', $email );
					$stmt->execute();
				}
				catch( PDOException $e )
				{
					print "ERROR: ".$e->getMessage()."<br/>";
					die();
				}
				$row=$stmt->fetch();
				
				if (!$row)
				{
					// Username or Email does not exist, therefore, user can register.
					$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
					$token = "NA";
					try
					{	
						$sql = "INSERT INTO users (username, password, email) VALUES (:db_username, :db_password, :db_email);";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam( ':db_username', $username );
						$stmt->bindParam( ':db_password', $hash );
						$stmt->bindParam( ':db_email', $email );
						$stmt->execute();
						$uid = $conn->lastInsertId();
						
						start_session($uid);
						$json->alert = alert("success", "Registration Successful!");
						$json->success = true;
					}
					catch( PDOException $e )
					{
						$json->alert = alert("danger", $e->getMessage());
						echo json_encode($json);
						die();
					}
				}
				else
					$json->alert = alert("danger", "Error: Username or Email already taken");

				
			}
		}
		echo json_encode($json);
	}
?>