<?php
session_start();

if (!isset($_SESSION['idUser']))
  return;

require '../class/Database.class.php';

$db = Database::getInstance();
$info = $db->getInfoPlanning();
$members = $db->getMembers();
$labels = $db->getAllLabels();
$types = $db->getTypes();

$data['info'] = $info;
$data['members'] = $members;
$data['types'] = $types;
$data['labels'] = $labels;

$json = json_encode($data);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='. $info['name'] . '.json');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($json));

echo $json;
?>
