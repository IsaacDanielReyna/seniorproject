<?php
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	
	if ($_POST)
	{
		$post = (object) $_POST;
		if ($post->cid != null || $post->cid != "")
		{			
			try
			{
				$sql = "SELECT * FROM companies WHERE employer=:employer";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam( ':employer', $user->id );
				$stmt->execute();
				$companies=$stmt->fetchAll();
				
				$valid = false;
				if (isset($companies))
				{
					for($i=0; $i<count($companies); $i++)
					{
						if($companies[$i]['id'] == $post->cid)
							$valid = true;
					}
				}
			}
			catch( PDOException $e )
			{
				$alert = new stdClass();
				$alert->type = "danger";
				$alert->messages[] = $e->getMessage();
				
				$data = new stdClass();
				$data->alert = $alert;
				$data->result = false;
				echo json_encode($data);
				die();
			}
			

			
			if ($valid)
			{
				try
				{
					$sql = "UPDATE users SET default_company=:cid WHERE id=:id";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam( ':id', $user->id );
					$stmt->bindParam( ':cid', $post->cid );
					$stmt->execute();
					
					$alert = new stdClass();
					$alert->type = "success";
					$alert->messages[] = "Company set as default.";
					
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
					$alert->messages[] = $e->getMessage();
					
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
				$alert->messages[] = "Access Denied";
				
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