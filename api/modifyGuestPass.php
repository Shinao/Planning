<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

if ($_SESSION['guest'] == "true")
  return ;

	$pw = $_REQUEST['pw'];

    $db = new Database();

    $result = $db->modifyGuestPass($pw);

    echo $result > 0 ? '<success></success>' : '<error>Impossible de modifer le mot de passe</error>';
?>
