<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

if ($_SESSION['guest'] == "true")
  return ;

	$name = $_REQUEST['name'];
	$oldName = $_REQUEST['oldName'];

    $db = new Database();

    $result = $db->modifyMember($name, $oldName);

    echo $result > 0 ? '<success></success>' : '<error>Impossible de modifer le membre correspondant</error>';
?>
