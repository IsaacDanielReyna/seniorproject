<?

	function InvalidRequest($request)
	{
		$data = new stdClass();
		$data->result = false;
		$data->messages[] = "Invalid Request: option=". $request->option .", task=". $request->task;
		return json_encode($data);
	}
	
	if ($_POST)
	{
		$request = (object) $_POST;
		//if(isset($request->token))
		
		require_once('jwt.php');
		$jwt = new JWT();
		
		
		if ($request->option == 'user')
		{
			require_once('dbconnect.php');
			require_once('Classes/User.php');
			$user_system = new User($conn);
			if ($request->task == 'login')
				echo $user_system->Login($jwt, $request);
			else if ($request->task == 'register')
				echo $user_system->Register($jwt, $request);
			else if ($request->task == 'update')
				echo $user_system->Update($jwt, $request);
			else
				echo InvalidRequest($request);
			die();
		}


		try
		{
			$user = $jwt->decode($request->token, SECRET_SERVER_KEY);
		}
		catch( Exception  $e ){
			$data = new stdClass();
			$data->result = false;
			$data->messages[] = "Invalid Token";
			echo json_encode($data);
			die();
		}
		
		require_once('dbconnect.php');
		
		
		if ($request->option == 'companies')
		{
			require_once('Classes/Company.php');
			$company = new Company($conn, $user);
			
			if ($request->task == 'select')
				echo $company->ListAll();
			elseif ($request->task == 'insert')
				echo $company->Insert($request);
			elseif ($request->task == 'update')
				echo $company->Update($request);
			elseif ($request->task == 'delete')
				echo $company->Remove($request);
				
			else
				echo InvalidRequest($request);
		}
		else
			echo InvalidRequest($request);
	}
	else
	{
		InvalidRequest($request);
		die();
	}
?>