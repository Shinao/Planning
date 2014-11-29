<?php

function MoisFrancais($pMois)
{
  $aMois = array(
    "Janvier",
    "Fevrier",
    "Mars",
    "Avril",
    "Mai",
    "Juin",
    "Juillet",
    "Aout",
    "Septembre",
    "Octobre",
    "Novembre",
    "Decembre"
  );
  return $aMois[$pMois-1] ;
}

$aJour = array(
  "L",
  "M",
  "M",
  "J",
  "V",
  "S",
  "D"
);

function initDateByYear($m_year)
{
  global $holidays, $year, $easterDate, $easterDay, $easterMonth, $easterYear;

  $year = $m_year;

  $easterDate  = easter_date($year);
  $easterDay   = date('j', $easterDate);
  $easterMonth = date('n', $easterDate);
  $easterYear   = date('Y', $easterDate);

  $holidays = array(
    // Dates fixes
    mktime(0, 0, 0, 1,  1,  $year),  // 1er janvier
    mktime(0, 0, 0, 5,  1,  $year),  // Fête du travail
    mktime(0, 0, 0, 5,  8,  $year),  // Victoire des alliés
    mktime(0, 0, 0, 7,  14, $year),  // Fête nationale
    mktime(0, 0, 0, 8,  15, $year),  // Assomption
    mktime(0, 0, 0, 11, 1,  $year),  // Toussaint
    mktime(0, 0, 0, 11, 11, $year),  // Armistice
    mktime(0, 0, 0, 12, 25, $year),  // Noel

    // Dates variables
    mktime(0, 0, 0, $easterMonth, $easterDay + 1,  $easterYear),
    mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear),
    mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear),
  );
}

function isNotWorkable($day, $month)
{
  global $holidays, $year, $easterDate, $easterDay, $easterMonth, $easterYear;

  // if ($date === null)
  //   $date = time();

  $date = strtotime($day . '-' . $month . '-' . $year);

  return in_array($date, $holidays);
}
?>
