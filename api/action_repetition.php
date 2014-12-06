<?php
session_start();

require '../class/Database.class.php';

if (isset($_SESSION['idUser'])) {
  // $exceptions = $_REQUEST['exceptions'];
  // $members = $_REQUEST['members'];
  // $rep_days = $_REQUEST['rep_days'];
  // $rep_end_month = $_REQUEST['rep_end_month'];
  // $rep_end_day = $_REQUEST['rep_end_day'];
  // $rep_start_year = $_REQUEST['rep_start_year'];
  // $rep_start_month = $_REQUEST['rep_start_month'];
  // $rep_start_day = $_REQUEST['rep_start_day'];
  // $rep_type = $_REQUEST['rep_type'];

  $exceptions = [[5, -1]];
  $members = ['test'];
  $rep_days = 7;
  $rep_end_month = 1;
  $rep_end_day = 0;
  $rep_start_year = 2014;
  $rep_start_month = 12;
  $rep_start_day = 6;
  $rep_type = 38;

  $db = new Database();

  foreach ($members as $m)
    $labels[$m] = $db->getLabelsByMember($m);

  $fsdate = $rep_start_year . '-' . $rep_start_month . '-' . $rep_start_day;
  $startdate = strtotime($fsdate);
  $enddate = strtotime($fsdate . ' + ' . $rep_end_month . ' months +' . $rep_end_day . ' days');
  $current_date = $startdate;
  $current_members = $members;

  echo "Begin</br>";
  echo "Start: " . date('d-m-Y', $startdate) . "</br>";
  echo "End: " . date('d-m-Y', $enddate) . "</br>";
  // While the repetition is not over
  while ($enddate > $current_date)
  {
    // Check here
    // if (isset($test[2014][12][20]))
    //   echo "yep";
    //

    // Checking each members for the day
    foreach ($members as $m)
    {
      // Checking each exceptions for the member
      foreach ($exceptions as $e)
      {
      }
    }

    // Increment by the days of the repetition
    $current_date += $rep_days * 60 * 60 * 24;
  }

  // echo "EXCEPTIONS: <br>";
  // foreach ($exceptions as $ex) idType - dayjmp
  //   echo $ex[0] . " - " . $ex[1] . "<br>";


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
