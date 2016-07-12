<?php
session_start();

header('content-type:text/xml;charset=utf-8');

if ($_SESSION['guest'] == "true")
  return ;

require '../class/Database.class.php';

$desc = $_REQUEST['desc'];
$year = $_REQUEST['year'];
$month = $_REQUEST['month'];
$day = $_REQUEST['day'];
$member = $_REQUEST['member'];

if (isset($_SESSION['idUser']))
{
  $db = new Database();

  $result = $db->addDescription($desc, $member, $day, $month, $year);

  if($result != false)
  {
    echo '<success></success>';
  } else
    echo '<error>Erreur lors de l\'ajout de la description</error>';
}
?>
