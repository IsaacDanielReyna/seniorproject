<?php
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	
	function get_company($conn, $user, $company){
		$employer = $user->id;//verify token
		try
		{
			$sql = "SELECT * FROM companies WHERE employer=:employer AND id=:company";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam( ':employer', $employer );
			$stmt->bindParam( ':company', $company );
			$stmt->execute();
			$row=$stmt->fetch();
			
			$alert = new stdClass();
			$alert->type = "success";
			
			
			$companies = $row;
			
			$data = new stdClass();
			$data->company=$companies;
			$data->alert = $alert;
			
			if ($companies != null || $companies != ""){
				$data->result = true;
				$alert->messages[] = "Company retrieved.";
			}
			else {
				$data->result = false;
				$alert->messages[] = "Access Denied";
			}
			return json_encode($data);
		}
		catch( PDOException $e )
		{
			$alert = new stdClass();
			$alert->type = "danger";
			$alert->messages[] = $e->getMessage();
			
			$data = new stdClass();
			$data->alert = $alert;
			$data->result = false;
			return json_encode($data);
		}
	}
	
	if ($_POST)
	{
		$post = (object) $_POST;
		echo get_company($conn, $user, $post->company);
	}
?>