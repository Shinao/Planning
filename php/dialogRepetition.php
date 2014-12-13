<script type="text/javascript">
var	rep_type;
var	members = [];
var	rep_days;
var	rep_end_month;
var	rep_end_day;
var	rep_start_year;
var	rep_start_month;
var	rep_start_day;
var	rep_altern;

function resetEvents()
{
  $(".nameMember.focusable").each(function(index)
{
  $(this).removeClass('focusable').removeClass('focused');
});

  $(".dayNumber.focusable").each(function(index)
{
  $(this).removeClass('focusable').removeClass('focused');
});
}

$(document).ready(function () {
  $("#dialogRepetition").dialog({
    autoOpen: false,
      modal: false,
      minWidth: 400,
      position: { my: "left center", at: "left center"},
      buttons: {
	"Suivant": function() {
	  if ($(".dayNumber.focused").length == 0 || $(".nameMember.focused").length == 0 || $(".legendPlanningItem.focused").data('id') < -1)
	  {
	    displayPopup("error", "Selectionnez un type, une date et des personnes");
	    return ;
	  }

	  $(".nameMember.focused").each(function(index) {
	    members.push($(this).html());
	  });
	  rep_days = $("#rep_days").val();
	  rep_end_month = $("#rep_end_month").val();
	  rep_end_day = $("#rep_end_day").val();
	  rep_start_year = year;
	  rep_start_month = month;
	  rep_start_day = $(".dayNumber.focused").html();
	  rep_type = $(".legendPlanningItem.focused").data('id');
	  rep_altern = $("#rep_altern").is(':checked');

	  $(this).dialog( "close" );
	  loadDialog('dialogRepetitionRules');
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
    $(this).off().on('click', function() {
      $(this).toggleClass('focused');
    });
  });
  $(".dayNumber").each(function(index) { 
    $(this).addClass('focusable');
    $(this).off().on('click', function() {
      if ($(".dayNumber.focusable.focused").length > 0)
	$(".dayNumber.focusable.focused").removeClass('focused');
      $(this).addClass('focused');
    });
  });

});
</script>

<div id="dialogRepetition" class="ui-widget" title="Action : Répétition">
	<form id="frmRepetition">
		<span>- Selectionnez le type</span></br></br>
		<span>- Selectionnez les personnes</span></br></br>
		<span>- Selectionnez la date de depart</span></br></br>
		<span>Intervalle (Jours) : <input type="number" value="7" name="rep_days" id="rep_days" min="1" max="9999" class="text ui-widget-content ui-corner-all" /></span></br></br>
		<span>Durée : <input type="number" name="rep_end_month" id="rep_end_month" value="0" min="0" max="12" class="text ui-widget-content ui-corner-all" /> Mois 
		<input type="number" value="0" name="rep_end_day" id="rep_end_day" min="0" max="31" class="text ui-widget-content ui-corner-all" /> Jours</span></br></br>
		<input type="checkbox" name="rep_altern" id="rep_altern" class="text ui-widget-content ui-corner-all" /> Alterner les membres</span></br>
	</form>
</div>
