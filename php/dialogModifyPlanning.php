<script type="text/javascript">
$().ready(function()
{
  $('input#name').attr('value', $('td.calendar').text());
  $("#dialogModifyPlanning").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Modifier": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/modifyPlanning.php",
		data: $('#frmModifyPlanning').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		  {
		    loadPlannings();
		    $('td.calendar').html($('#frmModifyPlanning #name').val());
		  }
		  else
		  {
		    displayPopup("error", racine.firstChild.nodeValue);
		  }
		}
	    });
	  $("#dialogModifyPlanning").dialog( "close" );
	},
	  "Annuler": function() {
	    $("#dialogModifyPlanning").dialog( "close" );
	  }
      },
	close: function() {
	}
  });
});
</script>
<div id="dialogModifyPlanning" class="ui-widget" title="Modifier le nom du Planning">
	<form id="frmModifyPlanning">
			<span>Nom</span>
			<input style="margin-top: 8px;" type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
