<?
	session_start();

	function update_user($data)
	{
		$u = new stdClass();
		$u->isset = true;
		$u->id = $data['id'];
		$u->gid = $data['gid'];
		$u->username = $data['username'];
		$u->email = $data['email'];
		$u->first_name = $data['first_name'];
		$u->middle_name = $data['middle_name'];
		$u->last_name = $data['last_name'];
		$u->phone_number = $data['phone_number'];
		$u->address = $data['address'];
		$u->city = $data['city'];
		$u->state = $data['state'];
		$u->zip_code = $data['zip_code'];
		if ($data['photo'] == null)
				$u->photo = 'default.jpg';
		else
			$u->photo = $data['photo'];
		$u->default_company = $data['default_company'];
		/**

		$u->name = $first . ' ' . $middle[0] . ' '. $last;
		$u->company = 0;
		$u->group = 0;
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
			$row=$stmt->fetch();
		}
		catch( PDOException $e )
		{
			print "ERROR: ".$e->getMessage()."<br/>";
			die();
		}

		
		if (!$row)
			header('Location: ../logout');
		else
			$user = update_user($row); // TODO: MOVE/FINISH THIS
	}
?>