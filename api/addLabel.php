<?php
session_start();

header('content-type:text/xml;charset=utf-8');

if ($_SESSION['guest'] == "true")
  return ;

require '../class/Database.class.php';

$comment = $_REQUEST['comment'];
$color = $_REQUEST['color'];
$year = $_REQUEST['year'];
$month = $_REQUEST['month'];
$member = $_REQUEST['member'];
$day = $_REQUEST['day'];

if (isset($_SESSION['idUser']))
{
  $db = new Database();

  $result = $db->addLabel($comment, $color, $member, $day, $month, $year);

  if($result != false)
  {
    echo '<success></success>';
  } else
    echo '<error>Erreur lors de l\'ajout du label</error>';
}
?>
