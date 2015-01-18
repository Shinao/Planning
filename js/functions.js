function displayPopup(type, info)
{
  $("#infoPopupContainer").append("<div id=\"infoPopup\">"+info+"</div>");
  $("#infoPopup:last-child").prepend("<img src=\"img/icon_"+type+".png\" id=\"imgIconPopup\">");
  type == "error" ? $("#infoPopup:last-child").css("background-color", "#C93E3E") : $("#infoPopup:last-child").css("background-color", "#8CA5ED");
  $("#infoPopup:last-child").slideDown("medium").delay(5000).slideUp("slow", function(){ $(this).remove() });
}

function loadLoggedForms()
{
  $.get('php/navbar.php', function(data)
      {
	$('#header').after(data);
      });
}

function loadPlannings()
{
  $('#planningCombobox').unbind('change');
  $.get('api/getPlannings.php', function(data){
    plannings = new Array();
    plannings.push("Charger");
    for(i=0;i < data.length;i++)
  {
    plannings.push(data[i]['name']);
  }
  $("#planningCombobox").jqxDropDownList({ source: plannings, 
    selectedIndex: 0, width: '150px', height: '25px', theme: 'orange', 
    autoDropDownHeight: 'true' });
  $("#planningCombobox").jqxDropDownList('disableAt', 0);
  loadEventPlanningCB();
  });
}

function loadPlanning()
{
  $.get('api/getPlanning.php?year='+year+'&month='+month, function(data)
      {
	var typeid = $(".legendPlanningItem.focused").attr('data-id');
	$('#planning #text').html(data);
	if (typeid)
  {
    $(".legendPlanningItem").removeClass("focused");
    $(".legendPlanningItem[data-id='"+typeid+"']").addClass("focused");
  }
  $('[data-colorlabel]').each(function(index)
    {
      $(this).attr('data-colordefault', $(this).css('background-color')).css('background-color', $(this).attr('data-colorlabel'));
    });
  $('.btnAddMember').on('click', function()
    {
      loadDialog('dialogAddMember');
    });
  $('span.modifyMember').on('click', function()
    {
      focusedMember = $(this).parent().parent().children().eq(0);
      loadDialog('dialogModifyMember');
    });
  $('span.deleteMember').on('click', function()
      {
	var trElement = $(this).parent().parent();
	$.get('api/delMember.php?name='+trElement.children().eq(0).text(), function(data)
	  {
	    var racine = data.firstChild;
	    if (racine.nodeName == "success")
	{
	  trElement.remove();
	}
	    else if (racine.nodeName == "error")
	{
	  displayPopup("error", racine.firstChild.nodeValue);
	}
	  });
      });
  $('span#btnThisMonth').on('click', function()
      {
	year = mydate.getYear();
	if (year < 1000)
    year += 1900;
  month = mydate.getMonth()+1;
  loadPlanning();
      });
  $('span#btnPreviousMonth').on('click', function()
      {
	if(month == 1)
  {
    month = 12;
    year = year - 1;
  } else
  {
    month = month - 1;
  }
  loadPlanning();
      });
  $('span#btnNextMonth').on('click', function()
      {
	if(month == 12)
  {
    month = 1;
    year = year + 1;
  } else
  {
    month = month + 1;
  }
  loadPlanning();
      });
  $('span.btnImage').on('click', function() { generateImage(); });
  $('span.btnPDF').on('click', function() { generatePDF(); });
  $('span.btnImportExport').on('click', function() { loadDialog('dialogImportExport'); });
  // $('span.btnPrint').on('click', function() { window.print(); });

  placeDescriptions();

  $('#planning .planningTable').sortable({
    containerSelector: 'table',
    itemPath: '> tbody',
    itemSelector: 'tr',
    handle: 'span.btnAction.sort',
    placeholder: '<tr class="placeholder"/>',
    onDrop: function ($item, container, _super, event) {
      $item.removeClass("dragged").removeAttr("style");
      $("body").removeClass("dragging");

      if (index_start_sort != $item.index())
    $.get('api/sortMember.php?name='+$item.children().eq(0).html()+'&oldindex='+index_start_sort+'&newindex='+$item.index());
    },
    onDragStart: function ($item, container, _super, event) {
		   $item.css({
		     height: $item.height(),
		   width: $item.width()
		   })
		   $item.addClass("dragged")
    $("body").addClass("dragging")
    index_start_sort = $item.index();
		 }
  });
      });
}

function placeDescriptions()
{
  $("#planning #text div.dayDescription").each(function()
      {
	var dayField = $("#planning #text tr.rowTablePlanning").eq($(this).data('mpos') + 2).children().eq($(this).data('mday'));
	console.log(dayField);
	var pos = dayField.position();

	//show the menu directly over the placeholder
	$(this).css({
	  position: "absolute",
	  top: pos.top + dayField.height() / 5 + "px",
	  left: (pos.left) + 4 + "px",
	}).show();
      });
}

function checkNavbar()
{
  if($('#navbar').css('display') == 'none')
    $('#navbar').show();
  // $('#navbar').animate({width: 'toggle'}, "slow");
}

function closeToolWindow()
{
  $('#toolNavbarContainer').animate({width: 'toggle'}, "slow");
  $('#navbar ul li.focused').removeClass('focused');
}


function loadDialog(name){
  $.get('php/'+name+'.php', function(data)
      {
	$('#dialogContainer').html(data);
	$('#'+name).dialog('open');
      });
}

function loadEventPlanningCB(){
  $('#planningCombobox').bind('change', function (event) {
    var args = event.args;
    var item = $('#planningCombobox').jqxDropDownList('getItem', args.index);
    $.get('api/setPlanning.php?name='+item.label, function(xml)
      {
	var racine = xml.firstChild;
	if(racine.nodeName == "success")
    {
      loadPlanning();
      if (racine.firstChild.nodeValue == "false")
      if($('#navbar').css('display') == 'none')
      $('#navbar').animate({width: 'toggle'}, "slow");
    } else
      displayPopup("error", racine.firstChild.nodeValue);
      });
  });
}

function generateImage()
{
  $(".navig, .btnTool, .btnAction").css('visibility', 'hidden');
  $(".rowTablePlanning td:last-child").css('display', 'none');
  var legendFocused = $(".legendPlanningItem.focused");
  legendFocused.removeClass('focused');

  placeDescriptions();

  html2canvas($("#planning"), {
    onrendered: function(canvas) {
		  // canvas is the final rendered <canvas> element
		  canvas.name = "test";
		  // var myImage = canvas.toDataURL("image/JPEG").slice('data:image/jpeg;base64,'.length);
		  var myImage = canvas.toDataURL("image/PNG");
		  var link = document.createElement('a');
		  link.download = 'Planning ' + $(".calendar").html() + " - " + $(".month").html() + '.png';
		  link.href = myImage;
		  link.click();

		  $(".navig, .btnTool, .btnAction").css('visibility', 'visible');
		  $(".rowTablePlanning td:last-child").css('display', 'table-cell');
		  legendFocused.addClass('focused');
		}});
}

function generatePDF()
{
  $(".navig, .btnTool, .btnAction").css('visibility', 'hidden');
  $(".rowTablePlanning td:last-child").css('display', 'none');
  var legendFocused = $(".legendPlanningItem.focused");
  legendFocused.removeClass('focused');

  placeDescriptions();

  html2canvas($("#planning"), {
    onrendered: function(canvas) {
		  // canvas is the final rendered <canvas> element
		  var myImage = canvas.toDataURL("image/PNG").slice('data:image/png;base64,'.length);
		  // Convert the data to binary form
		  myImage = atob(myImage)
    //new object of jspdf and save image to pdf.
    console.log(canvas);
  var ratio = 1.5;
  var doc = new jsPDF('l', 'px', [canvas.width / ratio , canvas.height / ratio]);
  doc.addImage(myImage, 'JPEG', 0, 0, canvas.width / ratio , canvas.height / ratio);
  doc.save('Planning ' + $(".calendar").html() + " - " + $(".month").html() + '.pdf');

  $(".navig, .btnTool, .btnAction").css('visibility', 'visible');
  $(".rowTablePlanning td:last-child").css('display', 'table-cell');
  legendFocused.addClass('focused');

  placeDescriptions();
		}
  });
}
