<?php
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	
	if ($_POST)
	{
		$post = (object) $_POST;
		if ($post->company_name != null || $post->company_name != "")
		{
			try
			{
				$sql = "INSERT INTO companies (name, employer) VALUES (:name, :employer)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':employer', $user->id );
				$stmt->bindParam( ':name', $post->company_name );
				$stmt->execute();
				$cid = $conn->lastInsertId();
				
				$alert = new stdClass();
				$alert->type = "success";
				$alert->messages[] = "New company created.";
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = true;
				echo json_encode($data);
				
				// if the user does not have a default company set, it'll set the newly created one here.
				if ($user->default_company == null || $user->default_company == "")
				{
					$sql = "UPDATE users SET default_company=:cid WHERE id=:id";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam( ':id', $user->id );
					$stmt->bindParam( ':cid', $cid );
					$stmt->execute();
				}
				
				die();
			}
			catch( PDOException $e )
			{
				$alert = new stdClass();
				$alert->type = "danger";
				$alert->messages[] = "Company name already used.";
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = false;
				echo json_encode($data);
				die();
				
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
			echo json_encode($data);
			die();
		}
	}
?>