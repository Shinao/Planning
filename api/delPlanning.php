<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

    $db = new Database();

    $result = $db->deletePlanning();

    echo $result > 0 ? '<success></success>' : '<error>Impossible de supprimer le planning correspondant</error>';
?>
