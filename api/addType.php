<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$name = $_REQUEST['name'];
	$color = urldecode($_REQUEST['color']);

	if (isset($_SESSION['idUser'])){
		$db = new Database();

		$result = $db->addType($name, $color);

		if($result != false)
		{
			if($result === -1)
				echo '<error>Ce nom existe deja pour un autre type, veuillez reessayer</error>';
			else
				echo '<success>'.$result.'</success>';
		} else
			echo '<error>Erreur lors de l\'ajout du type</error>';
	}
?>
