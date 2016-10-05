<?
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
		$payload = new stdClass();
		$payload->id = $user_id;
		$token = JWT::encode($payload, SECRET_SERVER_KEY);

		session_start();
		session_regenerate_id ();
		$_SESSION['session_valid'] = 1;
		$_SESSION['session_user_id'] = $user_id;
		$_SESSION['token'] = $token;

		$k = new stdClass();
		$k->token = $token;
		$k->session = session_id();
		return $k;
	}
	
	function displayname($data)
	{
		$displayname = $data['first_name'] . " ". $data['middle_name'] . " " . $data['last_name'];
		
		return $displayname;
	}
	
	if ($_POST)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$error = false;
		
		
		if (IsNullOrEmpty($username)){
			$error = true;
			$messages[] = "Username is empty";
		}
		
		if (IsNullOrEmpty($password)){
			$error = true;
			$messages[] = "Password is empty";
		}

		if ($error)
		{
			$alert = new stdClass();
			$alert->type = "danger";
			$alert->messages = $messages;
			
			$data = new stdClass();
			$data->alert = $alert;
			$data->result = false;
			echo json_encode($data);			
		}
		else
		{
			require_once("../scripts/dbconnect.php");
			
			try
			{	
				$sql = "SELECT * FROM users WHERE `username` = :db_username
						OR `email` = :db_username";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':db_username', $username );
				$stmt->execute();
			}
			catch( PDOException $e )
			{
				print "ERROR: ".$e->getMessage()."<br/>";
				die();
			}
			$row=$stmt->fetch();
			
			
			// verify password
			$hash = $row['password'];
			if (password_verify($password, $hash))
			{
				require_once("../scripts/jwt/JWTHelper.php");
				define("SECRET_SERVER_KEY", "UltimatelySecured@100%");

				$key = start_session($row['id']);
				
				$user = new stdClass();
				$user->id = $row['id'];
				$user->session = $key->session;
				$user->token = $key->token;
				$user->username = $row['username'];
				$user->email = $row['email'];
				$user->displayname = displayname($row);
				
				$alert = new stdClass();
				$alert->type = "success";
				$alert->messages[] = "Login Successful";
				
				$data = new stdClass();
				$data->result = true;
				$data->user = $user;
				$data->alert = $alert;
				echo json_encode($data);
			}
			else
			{			
				$alert = new stdClass();
				$alert->type = "danger";
				$alert->messages[] = "Wrong username or password";
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = false;
				echo json_encode($data);	
			}
		}
	}
?>