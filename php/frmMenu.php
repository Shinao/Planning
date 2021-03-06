<?php
if(!isset($_SESSION))
  session_start();
?>
<script type="text/javascript">
$(document).ready(function()
{
  loadPlannings();

  $('#modifyPass').on('click', function()
{
  loadDialog('dialogModifyPass');
});

$('#btnDisconnect').click(function()
{
  $.get('api/logout.php', function()
{
  $('#frmMenu').remove();
  $.get('php/frmLogin.php', function(data)
{
  $('#header').append(data);
});
$('#displayContentContainer').load('php/frmWelcolm.php');
if($('#navbar').css('display') != 'none')
{
  if($('#toolNavbarContainer').css('display') != 'none')
    $('#toolNavbarContainer').animate({width: 'toggle'}, "slow", function()
  {
    $(this).remove();
  });
  $('#navbar').animate({width: 'toggle'}, "slow", function()
  {
    $(this).remove();
  });
}
else
  $(this).remove();
});
});

<?php
if ($_SESSION['guest'] == "true")
{
?>
  return ;
  <?php } ?>
  $(document).delegate('#planning .legendPlanningItem', 'click', function(evt)
{
  $("#planning .legendPlanningItem").removeClass('focused');
  $(this).addClass('focused');

  if ($("#typesTool").hasClass('focused'))
  {
    $("#textTool #nameType").val($(this).children().eq(0).html());
    $(".color-picker").minicolors('value', 
      tinycolor($(this).children().eq(2).css('background-color')).toHex());
  }
});

$(document).delegate('#planning #text .planningTable td.dayField', 'mouseenter', function(evt){
  $(this).css('background-color', tinycolor($(this).css('background-color')).darken().toString(15));
});

$(document).delegate('#planning #text .planningTable td.dayField', 'mouseleave', function(evt){
  var attr = $(this).attr('data-colorlabel');
  if (typeof attr === typeof undefined || attr === false)
    attr = '';
  $(this).css('background-color', attr);
});

$(document).delegate('#planning #text .planningTable', 'mouseenter', function(evt)
  {
    $("#planning #text div.dayDescription").each(function() { $(this).hide(); });
  });
$(document).delegate('#planning #text .planningTable', 'mouseleave', function(evt)
  {
    $("#planning #text div.dayDescription").each(function() { $(this).show(); });
  });

$(document).delegate('#planning #text .planningTable td.dayField', 'click', function(evt)
  {
    var legend = $('#planning .legendPlanningItem.focused');
    if (legend.length == 0 || legend.attr('data-id') < -5)
    {
      displayPopup("error", "Type de label invalide");
      return ;
    }

    var itemDay = $(this);

    // Delete
    if (legend.attr('data-id') == -1)
    {
      $.get('api/delLabel.php?year='+year+'&month='+month+'&member='+$(this).parent().children().eq(0).text()+'&day='+$(this).attr('data-number'), function(data)
    {
 	    var racine = data.firstChild;
 	    if (racine.nodeName == "success")
 	    {
 	      itemDay.css('background-color', itemDay.attr('data-colordefault')).removeAttr('data-colordefault').removeAttr('data-colorlabel');

	      // Remove description
	    $("#planning div.dayDescription[data-mpos="+itemDay.parent().index()+"][data-mday="+itemDay.index()+"]").remove();
 	    }
 	    else if (racine.nodeName == "error")
 	      displayPopup("error", racine.firstChild.nodeValue);
 	  });
 	    return ;
    }
    // Description
    if (legend.attr('data-id') == -2)
    {
      if (!$(this).attr('data-colorlabel'))
	return;
	  
      dayClicked = itemDay;
      loadDialog('dialogAddDescription');
      return ;
    }

    // Add
    $.get('api/addLabel.php?member='+itemDay.parent().children().eq(0).text() + 
      '&day='+itemDay.attr('data-number') + '&year='+year+'&month='+month+
      '&comment=&color='+$('.legendPlanningItem.focused').data('id'), function(data)
      {
	var racine = data.firstChild;
	if (racine.nodeName == "success")
	{
	  itemDay.attr('data-colordefault', itemDay.css('background-color')).attr('data-colorlabel', $(".legendPlanningItem.focused").children().eq(2).
	    css('background-color')).css('background-color', itemDay.attr('data-colorlabel'));

	      // Remove description
	    $("#planning div.dayDescription[data-mpos="+itemDay.parent().index()+"][data-mday="+itemDay.index()+"]").remove();
	}
	else if (racine.nodeName == "error")
	{
	  displayPopup("error", racine.firstChild.nodeValue);
	}
      });
  });


loadEventPlanningCB();

$('#btnNew').click(function()
	{
	  loadDialog('dialogCreatePlanning');
	});

});
</script>
<div id="frmMenu">
	<div id="planningCombobox"></div>
<?php
  if($_SESSION['guest'] == 'false')
  {
?>
    <button type="submit" id="btnNew" class="standard">
	<img src="img/page_table_32.png" class="resizedImgButton"/>
	Nouveau
    </button>
	<button type="submit" id="modifyPass" class="standard">
	<img src="img/textfield_key.png" class="verticalized"/>
	Mots de passe
    </button>
<?php
  }
?>
    <button type="submit" id="btnDisconnect" class="standard">
	<img src="img/textfield_key.png"/>
	D&eacute;connexion
    </button>
</div>
