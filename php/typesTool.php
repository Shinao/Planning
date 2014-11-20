<span class="menuTool">
<script type="text/javascript">
$(document).ready(function () {
  $(".color-picker").minicolors({
    letterCase: 'uppercase',
      change: function(hex, rgb) {
	colorType = hex;
      }
  });

  var legend = $(".legendPlanningItem.focused");
  if (legend.attr("data-id") != "-1")
  {
    $("#nameType").val(legend.children().eq(0).html());
    $(".color-picker").minicolors('value', 
      tinycolor(legend.children().eq(2).css('background-color')).toHex());
  }

  $('#delType').on('click', function()
    {
      $.get('api/delType.php?name='+$(".legendPlanningItem.focused").children().eq(0), function(data)
    {
      var racine = data.firstChild;
      if (racine.nodeName == "success")
      {
	$('.legendPlanningItem').each(function(index)
      {
	if($(this).find('span:eq(0)').text() == $('#typesCombobox').jqxDropDownList('getSelectedItem').label)
	{
	  $(this).remove();
	  return false;
	}
      });
      }
      else if (racine.nodeName == "error")
      {
	displayPopup("error", racine.firstChild.nodeValue);
      }
    });
    });
  $('#addType').on('click', function()
      {
	$.get('api/addType.php?name='+$("#nameType").val()+'&color='+encodeURIComponent(colorType), function(data)
      {
	var racine = data.firstChild;
	if (racine.nodeName == "success")
	{
	  $('.legendPlanningItem').last().after('<div class=\'legendPlanningItem\' data-id=\''+racine.firstChild.nodeValue+'\'><span>'+$("#nameType").val()+'</span><br><span class=\'itemLegendColor\' style=\'background-color: '+colorType+';\'></span></div>');
	  $('#toolNavbarContainer').animate({width: 'toggle'}, "slow");
	  $('#navbar ul li.focused').removeClass('focused');
	}
	else if (racine.nodeName == "error")
	{
	  displayPopup("error", racine.firstChild.nodeValue);
	}
      });
      });
});
</script>
<div id="textTool">
	<p>Couleur</p>
	<input id="colorPicker" type="text" name="color1" class="color-picker" size="6" autocomplete="off" maxlength="7" /><br/><br/>
	<p>Nom</p>
	<input id="nameType" type="text" />
	<br/><br/>
	<button type="submit" id="addType" class="standard">
	<img src="img/add_16.png" class="verticalized"/>
	Ajouter
    </button>
	<button type="submit" id="modType" class="standard">
	<img src="img/apply2.png" class="verticalized"/>
	Modifier
    </button>
    </button>
	<button type="submit" id="delType" class="standard">
	<img src="img/cross.png" class="verticalized"/>
	Supprimer
    </button>
</div>
</span>
