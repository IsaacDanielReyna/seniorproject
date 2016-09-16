<?
	session_start();	
	function isLoggedIn()
	{
		if(isset($_SESSION['session_valid']) && $_SESSION['session_valid'])
			return true;
		return false;
	}
	if(!isLoggedIn())
		header('Location: ./login');
	else
		header('Location: ./main');
?>