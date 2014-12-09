<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/functions.js" type="text/javascript"></script>
<script src="js/jquery.miniColors.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="js/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="js/tinycolor.js"></script>
<script type="text/javascript" src="js/jspdf.min.js"></script>
<!-- <script type="text/javascript" src="js/filesaver&#45;min.js"></script> -->
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/canvas2image.js"></script>
<script>
$(document).ready(function()
  {
    mydate = new Date();
    year = mydate.getYear();
    if (year < 1000)
      year += 1900;
    month = mydate.getMonth()+1;
<?php
if(isset($_SESSION['idUser']))
{
  if($_SESSION['currentPlanningId'] != -1)
  { ?>
  loadPlanning();
<?php 
  if ($_SESSION['guest'] == 'false')
  { ?>
    checkNavbar();
<?php }
  }
}
?>
  });
</script>
	<link rel="icon" type="image/png" href="img/favicon.ico"/>
	<link href="css/cssreset.css" rel="stylesheet" type="text/css"/>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
	<link href="css/jquery.miniColors.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="js/jqwidgets/styles/jqx.base.css" type="text/css" />
	<link rel="stylesheet" href="js/jqwidgets/styles/jqx.orange.css" type="text/css" />
	<title>Planning</title>
    </head>
    <body>
	<div id="page">
	    <img src="img/planning.png" id="imgPlanning"/>
	    <div id="header">
		<img src="img/ThyssenKrupp_logo_opti.png" id="logoEnterprise"/>
		<?php isset($_SESSION['idUser']) ? include 'php/frmMenu.php' : include 'php/frmLogin.php'; ?>
	    </div>
<?php
if(isset($_SESSION['currentPlanningId']) && $_SESSION['currentPlanningId'] != -1)
  include 'php/navbar.php';
?>
	    <div id="header-line"></div>
	    <div id="infoPopupContainer"></div>
		<div id="displayContentContainer">
			<?php isset($_SESSION['idUser']) ? include 'php/frmPlanning.php' : include 'php/frmWelcolm.php'; ?>
		</div>
	    <div id="footer">
		   <p id="copyright">Copyright © 2011-2012 - Raphaël MONNERAT - Aucun droits réservés</p>
	    </div>
	</div>
	<div id="javascriptError">
	    <div id="title">Erreur</div>
	    <div id="text">Javascript n'est pas activé, le site ne peut fonctionner correctement</div>
	</div>
<script>
$("#javascriptError").hide();
$("#page").show();
</script>
	<div id="dialogContainer">
		</div>
    </body>
</html>
