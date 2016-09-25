<?
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
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