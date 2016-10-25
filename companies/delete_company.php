<?php
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	
	if ($_POST)
	{
		$post = (object) $_POST;
		if ($post->companyid != null || $post->companyid != "")
		{
			try
			{
				$sql = "UPDATE companies SET status=0 WHERE id=:companyid AND employer=:employer
				";
				
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':employer', $user->id );
				$stmt->bindParam( ':companyid', $post->companyid );
				$stmt->execute();
				
				$alert = new stdClass();
				$alert->type = "success";
				$alert->messages[] = "Company Deleted.";
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = true;
				echo json_encode($data);
				die();
			}
			catch( PDOException $e )
			{
				$alert = new stdClass();
				$alert->type = "danger";
				$alert->messages[] = "Error";
				
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
			$alert->messages[] = "Company not found";
			
			$data = new stdClass();
			$data->alert = $alert;
			$data->result = false;
			echo json_encode($data);
			die();
		}
	}
?>