<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$name = $_REQUEST['name'];

	if (isset($_SESSION['idUser'])){
		$db = new Database();

		$result = $db->addMember($name);

		if($result != false)
		{
			if($result === 3)
				echo '<error>Une personne dans ce planning possede deja ce nom</error>';
			else
				echo '<success></success>';
		} else
			echo '<error>Erreur lors de l\'ajout du membre</error>';
	}
?>
