<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$year = $_REQUEST['year'];
	$month = $_REQUEST['month'];
	$member = $_REQUEST['member'];
	$day = $_REQUEST['day'];

    $db = new Database();

    $result = $db->deleteLabel($member, $year, $month, $day);

    echo $result > 0 ? '<success></success>' : '<error>Impossible de supprimer le label correspondant</error>';
?>
