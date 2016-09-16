<?php
function alert($type, $message)
{
	$alert = new stdClass();
	if ($type == null || $type == "")
		$alert->type = "alert alert-info alert-dismissible";
	else
		$alert->type = "alert alert-".$type. "alert-dismissible";
	
	$alert->isset = true;
	$alert->message = $message;
	return $alert;
}
		
	if ($_POST)
	{
		$host = $_POST['host'];
		$database = $_POST['database'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$prefix = $_POST['prefix'];
		
		try
		{
			//connect
			$dbhost = "$host";
			$dbname = "$database";
			$dbuser = "$username";
			$dbpass = "$password";
			$conn = new PDO( "mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpass", array( PDO::ATTR_PERSISTENT => true ) );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			/////////////////////////////////////////////////
			$json = new stdClass();
			$json->result = true;
			$json->alert = alert("success", "validating: $username, $password");
			echo json_encode($json);
			
			if ($json->result)
			{
				$myfile = fopen("../scripts/dbconnect.php", "w") or die("Unable to open file!");
				$txt = 
'<?
try
{
	//connect
	$dbhost = "'.$host.'";
	$dbname = "'.$database.'";
	$dbuser = "'.$username.'";
	$dbpass = "'.$password.'";
	$conn = new PDO( "mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpass", array( PDO::ATTR_PERSISTENT => true ) );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch( PDOException $e )
{
	print "ERROR: ".$e->getMessage()."<br/>";
	die();
}
?>';
				fwrite($myfile, $txt);
				fclose($myfile);
			}
		}
		catch( PDOException $e )
		{
			$json = new stdClass();
			$json->result = false;
			$json->alert = alert("danger", "ERROR: ".$e->getMessage());
			echo json_encode($json);
			die();
		}
		

	}
?>