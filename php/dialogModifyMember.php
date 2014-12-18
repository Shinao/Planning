<script type="text/javascript">
$().ready(function()
{
  $('input#name').attr('value', focusedMember.text());
  $("#dialogModifyMember").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Modifier": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/modifyMember.php?oldName="+focusedMember.text(),
		data: $('#frmModifyMember').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		  {
		    focusedMember.html($('#frmModifyMember #name').val());
		  }
		  else
		  {
		    displayPopup("error", racine.firstChild.nodeValue);
		  }
		}
	    });
	  $("#dialogModifyMember").dialog( "close" );
	},
	  "Annuler": function() {
	    $("#dialogModifyMember").dialog( "close" );
	  }
      },
	close: function() {
	}
  });
});
</script>
<div id="dialogModifyMember" class="ui-widget" title="Modifier une personne">
	<form id="frmModifyMember">
			<span>Nom</span>
			<input style="margin-top: 8px;" type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
