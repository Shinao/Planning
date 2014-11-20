<?php
session_start();

header('content-type:text/json;charset=utf-8');

require '../class/Database.class.php';

if (isset($_SESSION['idUser'])){
  $db = new Database();

  $result = $db->getTypes();

  if($result)
    echo json_encode($result);
}
?>
