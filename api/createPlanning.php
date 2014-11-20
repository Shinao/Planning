<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$namePlanning = $_REQUEST['name'];

	if (isset($_SESSION['idUser'])){
		$db = new Database();

		$result = $db->createPlanning($namePlanning);

		if($result != false)
		{
			if($result === 3)
				echo '<error>Un planning de ce nom existe deja</error>';
			else
				echo '<success>Insertion reussie</success>';
		}
		else
			echo '<error>Impossible d\'ajouter un nouveau planning</error>';
	}
?>
