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
		session_start();
		session_regenerate_id ();
		$_SESSION['session_valid'] = 1;
		$_SESSION['session_user_id'] = $user_id;
	}
	
	if ($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (IsNullOrEmpty($username) || IsNullOrEmpty($password))
		{
			$json = new stdClass();
			$json->isLogin = 0;
			$json->alert = alert("danger", "Invalid username or password");
			echo json_encode($json);
		}
		else
		{
			// TODO: CLEAN THIS MESS UP
			require_once("../scripts/dbconnect.php");
			try
			{	
				$sql = "SELECT * FROM users WHERE `username` = :db_username";
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
			
			$hash = $row['password'];
			
			// verify password
			if (password_verify($password, $hash))
			{
				
				$arr = array('result' => 1, 'user_id' => $row['id'], 'token' => $row['token']);
				$json = json_encode($arr);
				echo json_encode(Array('isLogin' => '1', 'username' => $row['username'], 'user_id' => $row['id'], 'token' => $row['token'], 'email' => $row['email'], 'alert' => alert("success", "Success: Logging in")));
				start_session($row['id']);
			}
			else
			{
				$arr = array('result' => 0, 'user_id' => 0, 'token' => 0);
				$json = json_encode($arr);
				echo json_encode(Array('isLogin' => '0', 'alert' => alert("danger", "Wrong username or password")));
			}
		}
	}
?>