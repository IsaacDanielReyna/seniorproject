<?
	session_start();

	function update_user($data)
	{
		$u = new stdClass();
		$u->isset = true;
		$u->username = $data['username'];
		$u->email = $data['email'];
		$u->id = $data['id'];
		/**
		$user->first_name = $data['first'];
		$user->middle_name = $middle['middle'];
		$user->last_name = $last['last'];
		$user->name = $first . ' ' . $middle[0] . ' '. $last;
		$user->company = 0;
		$user->group = 0;
		/**/

		return $u;
	}
	
	function isLoggedIn()
	{
		if(isset($_SESSION['session_valid']) && $_SESSION['session_valid'])
			return true;
		return false;
	}
	
	if(!isLoggedIn()) // If you're not logged in, log out.
		header('Location: ../login');
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
			header('Location: ../logout');
		else
			$user = update_user($row); // TODO: MOVE/FINISH THIS
	}
?>