<?
try
{
	//connect
	$dbhost = "localhost";
	$dbname = "idreyna_seniorproject";
	$dbuser = "idreyna_sp_admin";
	$dbpass = "X8mHOwV3uLDq";
	$conn = new PDO( "mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpass", array( PDO::ATTR_PERSISTENT => true ) );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch( PDOException $e )
{
	print "ERROR: ".$e->getMessage()."<br/>";
	die();
}
?>