<script type="text/javascript">
$().ready(function()
{
  $("#dialogModifyGuestPass").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Modifier": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/modifyGuestPass.php",
		data: $('#frmModifyGuest').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		  {
		    displayPopup("info", "Mot de passe du compte invit&eacute; chang&eacute; avec succ&egrave;s");
		  }
		  else
		  {
		    displayPopup("error", racine.firstChild.nodeValue);
		  }
		}
	    });
	  $("#dialogModifyGuestPass").dialog( "close" );
	},
	  "Annuler": function() {
	    $("#dialogModifyGuestPass").dialog( "close" );
	  }
      },
	close: function() {
	}
  }).draggable();
});
</script>
<div id="dialogModifyGuestPass" class="ui-widget" title="Modifier compte invit&eacute;">
	<form id="frmModifyGuest">
			<span>Mot de passe</span>
			<input style="margin-top: 8px;" type="text" name="pw" id="pw" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
