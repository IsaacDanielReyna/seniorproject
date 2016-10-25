<?	
	$token = $_POST['token'];
	$alert = new stdClass();
	$alert->type = "success";
	$alert->messages[] = "Response from website.";
	$alert->messsage[] = "Token: ". $token;
	echo json_encode($alert);
?>