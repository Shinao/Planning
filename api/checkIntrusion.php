<?php
function	isLegit()
{
  if ($_SESSION['guest'] == "true")
    return false;
  return true;
}
?>
