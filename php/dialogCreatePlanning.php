<script type="text/javascript">
$().ready(function()
{
  $("#dialogCreatePlanning").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Creer": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/createPlanning.php",
		data: $('#frmCreatePlanning').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		  {
		    loadPlannings();
		  }
		  else
		  {
		    displayPopup("error", racine.firstChild.nodeValue);
		  }
		}
	    });
	  $(this).dialog( "close" );
	},
	  "Annuler": function() {
	    $(this).dialog( "close" );
	  }
      },
	close: function() {
	}
  });
});
</script>
<div id="dialogCreatePlanning" class="ui-widget" title="Creer un nouveau planning">
	<form id="frmCreatePlanning">
			<span>Nom du planning</span>
			<input style="margin-top: 8px;" type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
