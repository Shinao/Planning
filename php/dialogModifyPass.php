<script type="text/javascript">
$().ready(function()
{
  $("#dialogModifyPass").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Modifier": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/modifyPass.php",
		data: $('#frmModifyPass').serialize(),
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
	  $("#dialogModifyPass").dialog( "close" );
	},
	  "Annuler": function() {
	    $("#dialogModifyPass").dialog( "close" );
	  }
      },
	close: function() {
	}
  });
});
</script>
<div id="dialogModifyPass" class="ui-widget" title="Modifier compte invit&eacute;">
	<form id="frmModifyPass">
			<span>Mot de passe compte</span>
			<input style="margin-top: 8px;" type="text" name="pw" id="pw" class="text ui-widget-content ui-corner-all" /></br></br>
			<span>Mot de passe invité</span>
			<input style="margin-top: 8px;" type="text" name="pwguest" id="pwguest" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
