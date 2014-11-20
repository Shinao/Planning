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
		  {
		    nbTd = $('table.planningTable thead tr:first-child td').length - 2;
		    html = "<tr class='rowTablePlanning'><td class='nameMember'>"+$('#frmAddMember #name').val()+"</td>";
		    for(i = 1; i <= nbTd; i++)
		    {
		      html = html + "<td class='dayField' style='min-width: 14px; height:10px;' data-number='"+i+"'></td>";
		    }
		    html = html + "<td><span class='raph btnAction modifyMember' style='margin-left: -4px; margin-top: -1px;'>a</span><span class='raph btnAction deleteMember'>&Acirc;</span></td></tr>";
		    $('table.planningTable tbody').append(html);
		  }
		  else
		  {
		    displayPopup("error", racine.firstChild.nodeValue);
		  }
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
