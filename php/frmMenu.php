<?php
if(!isset($_SESSION))
  session_start();
?>
<script type="text/javascript">
function shadeColor1(color, percent) {  
  var num = parseInt(color,16),
    amt = Math.round(2.55 * percent),
    R = (num >> 16) + amt,
    G = (num >> 8 & 0x00FF) + amt,
    B = (num & 0x0000FF) + amt;
  return (0x1000000 + (R<255?R<1?0:R:255)*0x10000 + (G<255?G<1?0:G:255)*0x100 + (B<255?B<1?0:B:255)).toString(16).slice(1);
}



$().ready(function()
{
  loadPlannings();

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

$(document).delegate('#planning #text .planningTable td.dayField', 'click', function(evt)
  {
    var legend = $('#planning .legendPlanningItem.focused');
    if (legend.length == 0)
    {
      displayPopup("error", "Selectionnez d'abord un type de label");
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
      }
      else if (racine.nodeName == "error")
	displayPopup("error", racine.firstChild.nodeValue);
    });
      return ;
    }

    // Add
    $.get('api/addLabel.php?member='+itemDay.parent().children().eq(0).text() + 
      '&day='+itemDay.attr('data-number') + '&year='+year+'&month='+month+
      '&comment=none&color='+$('.legendPlanningItem.focused').children().eq(0).html(), function(data)
      {
	var racine = data.firstChild;
	if (racine.nodeName == "success")
	{
	  itemDay.attr('data-colordefault', itemDay.css('background-color')).attr('data-colorlabel', $(".legendPlanningItem.focused").children().eq(2).
	    css('background-color')).css('background-color', itemDay.attr('data-colorlabel'));
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
<?php
  }
?>
    <button type="submit" id="btnDisconnect" class="standard">
	<img src="img/textfield_key.png"/>
	D&eacute;connexion
    </button>
</div>
