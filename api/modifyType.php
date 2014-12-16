<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

if ($_SESSION['guest'] == "true")
  return ;

$name = $_REQUEST['name'];
$id = $_REQUEST['id'];
$color = urldecode($_REQUEST['color']);

$db = new Database();

$result = $db->modifyType($name, $id, $color);

echo $result > 0 ? '<success></success>' : '<error>Impossible de modifer le type correspondant</error>';
?>
