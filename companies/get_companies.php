<?php
	require_once("../scripts/dbconnect.php");
	require_once("../scripts/auth.php");
	
	function get_companies($conn, $user){
		$employer = $user->id;//verify token
		try
		{
			$sql = "SELECT * FROM companies WHERE employer=:employer ORDER BY name ASC";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam( ':employer', $employer );
			$stmt->execute();
			$companies=$stmt->fetchAll();
			
			$alert = new stdClass();
			$alert->type = "success";
			$alert->messages[] = "Existing companies retrieved.";
			
			$data = new stdClass();
			$data->companies=$companies;
			$data->alert = $alert;
			$data->result = true;
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
		echo get_companies($conn, $user);
	}
?>