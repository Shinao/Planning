<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

if ($_SESSION['guest'] == "true")
  return ;

$message = $_REQUEST['message'];

$db = new Database();

$result = $db->messagePlanning($message);

echo $result > 0 ? '<success></success>' : '<error>Impossible de modifer le message</error>';
?>


