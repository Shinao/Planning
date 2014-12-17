<?php
session_start();

if (!isset($_SESSION['idUser']))
  return;

require '../class/Database.class.php';

$month = $_REQUEST['month'];
$year = $_REQUEST['year'];

$db = Database::getInstance();
$info = $db->getInfoPlanning();
$members = $db->getMembersByPlanning();
$labels = $db->getLabels($month, $year);
$types = $db->getTypes();

$data['info'] = $info;
$data['members'] = $members;
$data['types'] = $types;
$data['labels'] = $labels;

$json = json_encode($data);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='. $info['name'] . '.txt');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($json));

echo $json;
?>
