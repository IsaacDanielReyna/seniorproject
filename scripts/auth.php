<?
	session_start();

	function update_user($data)
	{
		$user = new stdClass();
		$user->isset = true;
		$user->username = $data['username'];
		$user->id = $data['id'];
		/**
		$user->first_name = $data['first'];
		$user->middle_name = $middle['middle'];
		$user->last_name = $last['last'];
		$user->name = $first . ' ' . $middle[0] . ' '. $last;
		$user->company = 0;
		$user->group = 0;
		/**/

		return $user;
	}
	
	function isLoggedIn()
	{
		if(isset($_SESSION['session_valid']) && $_SESSION['session_valid'])
			return true;
		return false;
	}
	
	if(!isLoggedIn())
	{	
		header('Location: ../login');
		//die();
	}
	else
	{
		$uid = $_SESSION['session_user_id'];
		try
		{	
			$sql = "SELECT * FROM users WHERE `id` = :db_uid";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam( ':db_uid', $uid );
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
			//invalid user logout
			header('Location: ../logout');
		}
		else
			$user = update_user($row); // TODO: MOVE/FINISH THIS
	}
?>