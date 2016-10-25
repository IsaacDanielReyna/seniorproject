<?
	/**
	//User returns token
	if ($_GET['token'] != null && $_GET['token'] != '')
	{
		$token = $_GET['token'];
		$payload = JWT::decode($token, 'yamahar6');
		if ($payload != null || $payload != "")
		{
			json_decode($payload);
		}
		else
		{
			$data = new stdClass();
			$data->result = "Invalid Token";
			json_encode($data);
		}
		
		print_r($payload);
	}
	else if ($_GET['id'] != null && $_GET['id'] != '')
	{
		$payload = new stdClass();
		$payload->id = $_GET['id'];
		//Give result to user.
		$token = JWT::encode($payload, 'yamahar6');
		echo $token;
	}
	else
		echo "Send token or id for a result.";
	/**/
?>
<?php
require_once('JWTHelper.php');
//define("SECRET_SERVER_KEY", "UltimatelySecured@100%");

if ($_GET['id'] != null && $_GET['id'] != '')
{
	$token = array();

	$token['id'] = $_GET['id']; // putting hard coded right now but it can be dynamically from DB.
	$token['email'] = "jay@example.com";

	$encodedToken =  JWT::encode($token, SECRET_SERVER_KEY);

	echo $encodedToken;
}
else if ($_GET['token'] != null && $_GET['token'] != '')
{
	try{
		$token = JWT::decode($_GET['token'], SECRET_SERVER_KEY);
		print_r($token);
		echo $token->id;
	}
	catch( Exception  $e )
	{
		echo "Invalid Token";
		die();
	}
	
}
else
	echo "Set id or token for a result.";