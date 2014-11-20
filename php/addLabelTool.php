<span class="menuTool">
<script type="text/javascript">
$(document).ready(function () {
  $.get('api/getTypes.php', function(data){
    if(data[0] == "null")
    {
      $('#textTool').html('Aucun types enregistres');
      return false
    }
    types = new Array();
    for(i=0;i < data.length;i++)
    {
      types.push(data[i]['name']);
    }
    $("#typesCombobox").jqxDropDownList({ source: types, selectedIndex: 0, width: '100px', height: '25px', theme: 'energyblue', autoDropDownHeight: 'true' });
  });
  $('#cancelLabel').on('click', function()
    {
      closeToolWindow();
    });
  $('#addLabel').on('click', function()
    {
      if($('.focusedDay').length > 0)
      {
	$('.focusedDay').each(function(index)
      {
	var itemDay = $(this);
	$.get('api/addLabel.php?member='+itemDay.parent().children().eq(0).text()+'&day='+itemDay.attr('data-number')+'&year='+year+'&month='+month+'&comment='+$("#commentLabel").attr('value')+'&color='+$('#typesCombobox').jqxDropDownList('getSelectedItem').label, function(data)
      {
	var racine = data.firstChild;
	if (racine.nodeName == "success")
	{
	  $.get('api/getColor.php?type='+$('#typesCombobox').jqxDropDownList('getSelectedItem').label, function(data)
	{
	  var racine = data.firstChild;
	  if (racine.nodeName == "success")
	  {
	    itemDay.attr('data-colorlabel', racine.firstChild.nodeValue).removeClass('focusedDay').css('background-color', itemDay.attr('data-colorlabel'));
	    if(itemDay.attr('data-colordefault') == undefined)
	      itemDay.attr('data-colordefault', itemDay.css('background-color'));
	  }
	  else if (racine.nodeName == "error")
	  {
	    displayPopup("error", racine.firstChild.nodeValue);
	  }
	});
	}
	else if (racine.nodeName == "error")
	{
	  displayPopup("error", racine.firstChild.nodeValue);
	}
      });
      });
	$('#toolNavbarContainer').animate({width: 'toggle'}, "slow");
	$('#navbar ul li.focused').removeClass('focused');
      }
      else
	displayPopup('error', 'Veuillez selectionner un jour');
    });
});
</script>
<div id="titleTool">
	Types
</div>
<div id="textTool">
	<div id="typesCombobox" style="display: inline-block;"></div><br/><br/>
	<p>Commentaire</p>
	<input id="commentLabel" type="text" />
	<br/><br/><br/>
	<button type="submit" id="addLabel" class="standard">
	<img src="img/add_16.png" class="verticalized"/>
	Ajouter
    </button>
    <button type="submit" id="cancelLabel" class="standard">
	<img src="img/cross.png" class="verticalized"/>
	Annuler
    </button>
</div>
</span>
