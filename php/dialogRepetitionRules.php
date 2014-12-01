<script type="text/javascript">
$(document).ready(function () {
  $("#dialogRepetitionRules").dialog({
    autoOpen: false,
      modal: false,
      minWidth: 400,
      buttons: {
	"Suivant": function() {
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
		    // loadPlannings();
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
	    resetEvents();
	}
  }).draggable();

  // Setup events
  $(".nameMember").each(function(index) { 
    $(this).addClass('focusable');
    $(this).on('click', function() {
      $(this).toggleClass('focused');
    });
  });
  $(".dayNumber").each(function(index) { 
    $(this).addClass('focusable');
    $(this).on('click', function() {
      if ($(".dayNumber.focusable.focused").length > 0)
	$(".dayNumber.focusable.focused").removeClass('focused');
      $(this).addClass('focused');
    });
  });

});
</script>

<div id="dialogRepetitionRules" class="ui-widget" title="Action : Répétition">
	<form id="frmRepetition">
		<span>- Test2</span></br></br>
		<span>- Selectionnez la date de depart</span></br></br>
		<span>Intervalle (Jours) : <input type="number" name="repetition" id="repetition" min="1" max="9999" class="text ui-widget-content ui-corner-all" /></span></br></br>
		<span>Durée : <input type="number" name="rep_month" id="rep_month" value="0" min="0" max="12" class="text ui-widget-content ui-corner-all" /> Mois 
		<input type="number" value="0" name="rep_day" id="rep_day" min="0" max="31" class="text ui-widget-content ui-corner-all" /> Jours</span></br>
	</form>
</div>
