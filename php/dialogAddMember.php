<script type="text/javascript">
$().ready(function()
{
  $("#dialogAddMember").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Ajouter": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/addMember.php",
		data: $('#frmAddMember').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		    loadPlanning();
		  else
		    displayPopup("error", racine.firstChild.nodeValue);
		}
	    });
	  $("#dialogAddMember").dialog( "close" );
	},
	  "Annuler": function() {
	    $("#dialogAddMember").dialog( "close" );
	  }
      },
	close: function() {
	}
  }).draggable();
});
</script>
<div id="dialogAddMember" class="ui-widget" title="Ajouter une personne">
	<form id="frmAddMember">
			<span>Nom</span>
			<input style="margin-top: 8px;" type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
