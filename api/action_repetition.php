<?php
session_start();

header('content-type:text/xml;charset=utf-8');

require '../class/Database.class.php';

if (isset($_SESSION['idUser'])){

  $exceptions = $_REQUEST['exceptions'];
  $members = $_REQUEST['members'];
  $rep_days = $_REQUEST['rep_days'];
  $rep_end_month = $_REQUEST['rep_end_month'];
  $rep_end_day = $_REQUEST['rep_end_day'];
  $rep_start_year = $_REQUEST['rep_start_year'];
  $rep_start_month = $_REQUEST['rep_start_month'];
  $rep_start_day = $_REQUEST['rep_start_day'];

  $db = new Database();

  echo "EXCEPTIONS: <br>";
  foreach ($exceptions as $ex)
    echo $ex[0] . " - " . $ex[1] . "<br>";

  echo "MEMBERS: <br>";
  foreach ($members as $m)
    echo $m . "<br>";

  // $result = $db->addMember($name);

  // if($result != false)
  // {
  //   if($result === 3)
  //     echo '<error>Une personne dans ce planning possede deja ce nom</error>';
  //   else
  //     echo '<success></success>';
  // } else
  //   echo '<error>Erreur lors de l\'ajout du membre</error>';
}
?>

