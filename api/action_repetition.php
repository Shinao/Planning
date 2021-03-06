<?php
session_start();

require '../class/Database.class.php';
require 'date.php';

if (isset($_SESSION['idUser'])) {
  $SEC_DAY = 60 * 60 * 24;
  $warnings = [];

  if (isset($_REQUEST['exceptions']))
    $exceptions = $_REQUEST['exceptions'];
  else
    $exceptions = [];
  $members = $_REQUEST['members'];
  $rep_days = $_REQUEST['rep_days'];
  $rep_end_month = $_REQUEST['rep_end_month'];
  $rep_end_day = $_REQUEST['rep_end_day'];
  $rep_start_year = $_REQUEST['rep_start_year'];
  $rep_start_month = $_REQUEST['rep_start_month'];
  $rep_start_day = $_REQUEST['rep_start_day'];
  $rep_type = $_REQUEST['rep_type'];
  $rep_altern = $_REQUEST['rep_altern'] == "true" ? true : false;

  // $exceptions = [];
  // $members = ['R.DRIEUX', 'M.AHNOU', 'E.COMTE', 'S.GORI'];
  // $rep_days = 7;
  // $rep_end_month = 6;
  // $rep_end_day = 0;
  // $rep_start_year = 2015;
  // $rep_start_month = 1;
  // $rep_start_day = 4;
  // $rep_type = -1;
  // $rep_altern = false;

  // $exceptions = [[47, -1], [47, -8], [47, 6], [41, -2], [41, 1], [47, -7]];
  // $members = ['R.DRIEUX', 'M.AHNOU', 'E.COMTE', 'S.GORI'];
  // $rep_days = 7;
  // $rep_end_month = 6;
  // $rep_end_day = 0;
  // $rep_start_year = 2015;
  // $rep_start_month = 1;
  // $rep_start_day = 4;
  // $rep_type = 47;
  // $rep_altern = true;

  initDateByYear($rep_start_year);

  $db = new Database();

  foreach ($members as $m)
    $labels[$m] = $db->getLabelsByMember($m);

  $fsdate = $rep_start_year . '-' . $rep_start_month . '-' . $rep_start_day;
  $startdate = strtotime($fsdate);
  $enddate = strtotime($fsdate . ' + ' . $rep_end_month . ' months +' . $rep_end_day . ' days');
  $current_date = $startdate;
  $current_members = $members;

  // echo "Begin</br>";
  // echo "Start: " . date('d-m-Y', $startdate) . "</br>";
  // echo "End: " . date('d-m-Y', $enddate) . "</br>";
  // While the repetition is not over
  while ($enddate > $current_date)
  {
    $iMember = -1;
    // Checking each members for the day
    foreach ($current_members as $m)
    {
      ++$iMember;
      // Checking each exceptions for the member
      foreach ($exceptions as $e)
      {
	$ex_date = $current_date + ($SEC_DAY * $e[1]);
	$fex_date = getdate($ex_date);
	$is_set = isset($labels[$m][$fex_date['year']][$fex_date['mon']][$fex_date['mday']]);
	if ($is_set)
	  $label = $labels[$m][$fex_date['year']][$fex_date['mon']][$fex_date['mday']];

	// Check special exception
	// Empty - WE - Ferie
	if (($e[0] == -1 && !$is_set) ||
	($e[0] == -6 && ($fex_date['wday'] == 0 || $fex_date['wday'] == 6)) ||
	($e[0] == -7 && isNotWorkable($fex_date['mday'], $fex_date['mon'])) ||
	($is_set && $label == $e[0]))
	{
	  // Warning
	  if (!$rep_altern || $iMember + 1 == count($current_members))
	    $warnings[date('d-m-Y', $current_date) . " : " . $m . "<br>"] = "";
	  continue 2;
	}
      }

      // Current Member is allowed
      $fcdate = getdate($current_date);
      // print_r($fcdate);
      if ($rep_type == -1)
      {
	$db->deleteLabel($m, $fcdate['year'], $fcdate['mon'], $fcdate['mday']);
	unset($labels[$m][$fcdate['year']][$fcdate['mon']][$fcdate['mday']]);
      }
      else
      {
	$db->addLabel("", $rep_type, $m, $fcdate['mday'], $fcdate['mon'], $fcdate['year']);
	$labels[$m][$fcdate['year']][$fcdate['mon']][$fcdate['mday']] = $rep_type;
      }

      unset($current_members[$iMember]);

      // Altern members : do not loop
      if ($rep_altern)
	break ;
    }

    // Refill members
    // print_r($current_members);
    $current_members = array_merge($current_members, $members);
    // echo "<br>";
    // print_r($current_members);
    // echo "<br>";
    // echo "<br>";

    // Increment by the days of the repetition
    $current_date += $rep_days * $SEC_DAY;
  }

  // Display all warnings
  foreach($warnings as $w => $v)
    echo $w;
}
?>
