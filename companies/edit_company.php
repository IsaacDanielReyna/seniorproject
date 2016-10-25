<?php
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");

	function editcompany($conn, $user, $post)
	{
		if ($post->name != null || $post->name != "")
		{
			try
			{
				$sql = "UPDATE companies SET 
				name=:name,
				address=:address,
				city=:city,
				state=:state,
				zip=:zip,
				country=:country,
				timezone=:timezone,
				description=:description
				WHERE id=:companyid AND employer=:employer
				";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':employer', $user->id );
				$stmt->bindParam( ':companyid', $post->companyid );
				$stmt->bindParam( ':name', $post->name );
				$stmt->bindParam( ':address', $post->address);
				$stmt->bindParam( ':city', $post->city );
				$stmt->bindParam( ':state', $post->state );
				$stmt->bindParam( ':zip', $post->zip );
				$stmt->bindParam( ':country', $post->country );
				$stmt->bindParam( ':timezone', $post->timezone );
				$stmt->bindParam( ':description', $post->description );
				$stmt->execute();
				
				$alert = new stdClass();
				$alert->type = "success";
				$alert->messages[] = "Company updated.";
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = true;
				return json_encode($data);
			}
			catch( PDOException $e )
			{
				$alert = new stdClass();
				$alert->type = "danger";
				$alert->messages[] = "Error";
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = false;
				return json_encode($data);
				
			}
		}
		else
		{
			$alert = new stdClass();
			$alert->type = "danger";
			$alert->messages[] = "Company name must not be empty.";
			
			$data = new stdClass();
			$data->alert = $alert;
			$data->result = false;
			return json_encode($data);
		}
	}
	
	if ($_POST)
	{
		$post = (object) $_POST;
		echo editcompany($conn, $user, $post);
	}
?>