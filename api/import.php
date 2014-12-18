<?php
session_start();

if (!isset($_SESSION['idUser']))
  return;

require '../class/Database.class.php';

$json = file_get_contents($_FILES['file']['tmp_name']);
$data = json_decode($json, true);

$db = Database::getInstance();
$db->importPlanning($data);

header('Location: ../index.php');
?>
