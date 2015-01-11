<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

if ($_SESSION['guest'] == "true")
  return ;

$name = $_REQUEST['name'];
$old_index = $_REQUEST['oldindex'];
$new_index = $_REQUEST['newindex'];

$db = new Database();

$result = $db->sortMember($name, $old_index, $new_index);

echo $result > 0 ? '<success></success>' : '<error>Impossible de modifer le membre correspondant</error>';
?>
