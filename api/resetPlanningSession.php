<?php
	session_start();

	if (isset($_SESSION['idUser']))
	{
			$_SESSION['currentPlanningId'] = -1;
			$_SESSION['currentPlanningName'] = -1;
	}
?>
