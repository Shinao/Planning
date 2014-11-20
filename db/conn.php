<?php
	$dsn = 'mysql:189629_planning=testdb;host=sql.olympe-network.com';
	$user = '189629_planning';
	$password = 'hosting';

	try
	{
		$connexion = new PDO($dsn, $user, $password);
	}

	catch(PDOException $e)
	{
		echo "<script>displayError(\"Impossible de se connecter à la base de données\")</script>".$e;

		$connexion = NULL;
	}
?>
