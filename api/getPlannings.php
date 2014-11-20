<?php
session_start();

header('content-type:text/json;charset=ISO-8859-15');

require '../class/Database.class.php';

if (isset($_SESSION['idUser'])){
  $db = Database::getInstance();

  $result = $db->getPlannings();

  if($result)
    echo json_encode($result);
}
?>
