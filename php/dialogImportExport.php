<script type="text/javascript">
$().ready(function()
{
  $("#dialogImportExport").dialog({
    autoOpen: false,
      modal: true,
      width: '400px',
      open: function() {
	$('.btnExport').on('click', function() {
	  console.log('in');
	  window.location = 'api/export.php';
	});
	$('#fileupload:file').change(function(){
	  if( $('#fileupload').val() != ""){
	    $('#frmImport').submit();
	  }
	});
      },
      buttons: {
	"Quitter": function() {
	  $(this).dialog( "close" );
	}
      },
	close: function() {
	}
  });
});
</script>
<div id="dialogImportExport" class="ui-widget" title="Importer/Exporter">
Exporter au format JSON
<br>
<span class="btnTool btnExport" enable="disable"><img class="resizedImgPlanning" src="img/export.png"/>Exporter</span>
<br/><br/>
Importer un fichier JSON
<form id="frmImport" action="api/import.php" method="post" enctype="multipart/form-data">
<input id="fileupload" type="file" name="file"/>
<form>
</div>


