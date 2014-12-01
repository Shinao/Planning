<script>
$().ready(function() {
  $('#typesTool, #optionsTool, #actionsTool').on('click', function()
    {
      var tool = $(this);
      $('.menuTool').slideUp('slow', function() { $(this).remove() });
      if (!tool.hasClass('focused'))
      {
	$.get('php/'+tool.attr('id')+'.php', function(data)
      	{
	  tool.after(data);
	  $('.menuTool').slideDown('slow');
	});
	$('#navbar .focused').toggleClass('focused');
	$(this).addClass('focused');
      }
      else
	$('#navbar .focused').toggleClass('focused');
    });
});
</script>
<div id="navbar">
    <ul>
	<li id="typesTool"><span class="raph" style="padding-top: 16px;">&Ecirc;</span><span>Types</span></li>
	<li id="actionsTool"><span class="raph">J</span><span>Actions</span></li>
	<li id="optionsTool"><span class="raph">&Ntilde;</span><span>Options</span></li>
    </ul>
</div>
