<?php
	session_start();

	header('content-type:text/xml;charset=utf-8');

	require '../class/Database.class.php';

	$pseudo = isset($_REQUEST['login']) ? $_REQUEST['login'] : '';
	$guestpass = isset($_REQUEST['pw']) ? $_REQUEST['pw'] : '';

    $db = new Database();

    $result = $db->existGuest($pseudo, $guestpass);

    if($result != false)
    {
    	echo '<success>Connexion reussie</success>';
    	$_SESSION['idUser'] = $result['id'];
    	$_SESSION['pseudo'] = $result['pseudo'];
    	$_SESSION['currentPlanningId'] = -1;
    	$_SESSION['guest'] = 'true';
    }
    else
    	echo '<error>Identifiant ou mot de passe incorrect</error>';
?>
