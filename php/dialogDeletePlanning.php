<script type="text/javascript">
$().ready(function()
{
  $("#dialogDeletePlanning").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Oui": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/delPlanning.php",
		data: $('#frmDeletePlanning').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		  {
		    loadPlannings();
		    $('#navbar').animate({width: 'toggle'}, "slow");
		    $('#displayContentContainer').load('php/frmPlanning.php', function()
		  {
		    $('#planning').draggable({ cancel: '#text'});
		  });
		    $.get('api/resetPlanningSession.php');
		  }
		  else
		  {
		    displayPopup("error", racine.firstChild.nodeValue);
		  }
		}
	    });
	  $("#dialogDeletePlanning").dialog( "close" );
	},
	  "Non": function() {
	    $("#dialogDeletePlanning").dialog( "close" );
	  }
      },
	close: function() {
	}
  }).draggable();
});
</script>
<div id="dialogDeletePlanning" class="ui-widget" title="Suppression du Planning">
	<form id="frmModifyPlanning">
			<span>&Ecirc;tes vous s&ucirc;r de vouloir supprimer ce Planning ?</span>
	</form>
</div>
