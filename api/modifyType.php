<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

if ($_SESSION['guest'] == "true")
  return ;

$name = $_REQUEST['name'];
$oldName = $_REQUEST['oldName'];
$color = urldecode($_REQUEST['color']);

$db = new Database();

$result = $db->modifyType($name, $oldName, $color);

echo $result > 0 ? '<success></success>' : '<error>Impossible de modifer le type correspondant</error>';
?>
