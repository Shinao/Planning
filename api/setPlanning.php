<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

$name = $_REQUEST['name'];

if (isset($_SESSION['idUser'])){
  $db = new Database();

  $result = $db->getPlanningByName($name);

  if($result != false)
  {
    $_SESSION['currentPlanningId'] = $result;
    $_SESSION['currentPlanningName'] = $name;
    echo '<success>'.$_SESSION['guest'].'</success>';
  } else
    echo '<error>Erreur lors de la recherche du planning</error>';
}
?>
