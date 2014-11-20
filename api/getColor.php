<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$name = $_REQUEST['type'];

	if (isset($_SESSION['idUser'])){
		$db = new Database();

		$result = $db->getColorByType($name);

		if($result)
			echo "<success>$result</success>";
		else
			echo "<error>Recuperation de la couleur impossible</error>";
	}
?>
