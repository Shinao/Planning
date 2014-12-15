<script type="text/javascript">
$().ready(function()
{
  $('input#name').attr('value', $('td.calendar').text());
  $("#dialogMessagePlanning").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Modifier": function() {
	  $.ajax(
	    {
	      type: "POST",
		url: "api/messagePlanning.php",
		data: $('#frmMessagePlanning').serialize(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName == "success")
		  {
		    loadPlannings();
		    $('td.calendar').html($('#frmMessagePlanning #name').val());
		    loadPlanning();
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
  }).draggable();
});
</script>
<div id="dialogMessagePlanning" class="ui-widget" title="Modifier le message du Planning">
	<form id="frmMessagePlanning">
			<span>Message</span>
			<textarea style="margin-top: 8px;" type="text" name="message" id="message" class="text ui-widget-content ui-corner-all" />
	</form>
</div>

