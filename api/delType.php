<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

$id = $_REQUEST['id'];

$db = new Database();

$result = $db->deleteType($id);

echo $result > 0 ? '<success></success>' : '<error>Impossible de supprimer le type correspondant</error>';
?>
