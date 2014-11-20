<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$name = $_REQUEST['name'];

    $db = new Database();

    $result = $db->deleteType($name);

    echo $result > 0 ? '<success></success>' : '<error>Impossible de supprimer le type correspondant</error>';
?>
