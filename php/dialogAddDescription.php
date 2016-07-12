<script type="text/javascript">
$().ready(function()
{
//jQuery ismouseover  method
(function($){ 
    $.mlp = {x:0,y:0}; // Mouse Last Position
    function documentHandler(){
        var $current = this === document ? $(this) : $(this).contents();
        $current.mousemove(function(e){jQuery.mlp = {x:e.pageX,y:e.pageY}});
        $current.find("iframe").load(documentHandler);
    }
    $(documentHandler);
    $.fn.ismouseover = function(overThis) {  
        var result = false;
        this.eq(0).each(function() {  
                var $current = $(this).is("iframe") ? $(this).contents().find("body") : $(this);
                var offset = $current.offset();             
                result =    offset.left<=$.mlp.x && offset.left + $current.outerWidth() > $.mlp.x &&
                            offset.top<=$.mlp.y && offset.top + $current.outerHeight() > $.mlp.y;
        });  
        return result;
    };  
})(jQuery);
  
  $("#dialogAddDescription").dialog({
    autoOpen: false,
      modal: true,
      buttons: {
	"Modifier": function() {
	  // Remove old one
	    $("#planning div.dayDescription[data-mpos="+dayClicked.parent().index()+"][data-mday="+dayClicked.index()+"]").remove();

	  var t = $("<span>Hollaa</span>");
	  var elem = $("<div class='dayDescription' data-mpos="+dayClicked.parent().index()+" data-mday="+dayClicked.index() + ">"+$('#frmAddDescription #desc').val()+"</div>");
	  // elem.state.focusable = false;
	  $("#text").append(elem);
	  placeDescriptions();

	  var _dayClicked = dayClicked;
	  
	  $.ajax(
	    {
	      type: "POST",
		url: "api/addDescription.php?desc="+$('#frmAddDescription #desc').val()
		+"&year="+year+"&month="+month+"&day="+_dayClicked.attr('data-number')
		+"&member="+_dayClicked.parent().children().eq(0).html(),
		success: function(xml)
		{
		  var racine = xml.firstChild;
		  if (racine.nodeName != "success")
		    displayPopup("error", racine.firstChild.nodeValue);
		}
	    });
	  $("#dialogAddDescription").dialog( "close" );
	},
	  "Annuler": function() {
	    $("#dialogAddDescription").dialog( "close" );
	  }
      },
	close: function() {
	},
    open: function()
		  {
		    $("#desc").val("");
		    $("#desc").val($("#planning div.dayDescription[data-mpos="+dayClicked.parent().index()+"][data-mday="+dayClicked.index()+"]").html());
		  }
  });
});
</script>
<div id="dialogAddDescription" class="ui-widget" title="Ajouter une description">
	<form id="frmAddDescription">
			<span>Description</span>
			<input val="" style="margin-top: 8px;" type="text" name="desc" id="desc" class="text ui-widget-content ui-corner-all" />
	</form>
</div>
